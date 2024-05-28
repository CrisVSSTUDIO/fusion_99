<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tag;
use App\Models\Asset;
use App\Models\Category;
use Phpml\Metric\Accuracy;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Phpml\Clustering\DBSCAN;
use App\Models\DownloadHistory;
use Phpml\Dataset\ArrayDataset;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Phpml\Classification\NaiveBayes;
use Phpml\Metric\ClassificationReport;
use App\Http\Requests\AssetPostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AssetUpdateRequest;
use Phpml\CrossValidation\StratifiedRandomSplit;


class ProductController extends Controller
{
    /*     public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    } */
    /**
     * Display a listing of the resource.
     */
    /* q< */
    public function index($category_slug)
    {
        //
        $assets =  Asset::join('categories', 'assets.category_id', '=', 'categories.id')->select('assets.id', 'assets.name', 'assets.description', 'assets.upload', 'assets.slug', 'categories.category_name')->where('categories.slug', '=', $category_slug)->where('categories.user_id', '=', Auth::user()->id)->cursorPaginate();
        // $categoryProducts = Category::with('products')->where('slug', $category_slug)->get();
        //gets all products related to that category in an optimized way
        return view('products.index', compact('assets', 'category_slug')); //return the view all that data
    }

    public function getLatestWallpaper()
    {
        if (Auth::check()) {
            $categoryname = 'Wallpapers';
            $wallpaper = DB::table('assets')->join('categories', 'assets.category_id', '=', 'categories.id')->where('category_name', 'LIKE', $categoryname)->where('user_id', '=', Auth::user()->id)->latest('assets.upload')->value('assets.upload');
            return view('layouts.app', ['wallpaper' => $wallpaper]);
        } else {
            return view('layouts.app');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssetPostRequest $request)
    {
        //

        $request->validated();
        $category_slug = DB::table('categories')->select('slug')->where('id', '=', $request->input('category'))->value('slug');
        $path = $request->file('upload')->storeAs('public', time() . '_' . $request->file('upload')->getClientOriginalName());
        $product = new Asset([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'slug' => Str::slug($request->get('name')),
            'upload' => $path,
            'category_id' => $request->input('category'),
            'filesize' => (float)($request->file('upload')->getSize()) / 1000000,
            'filetype' => $request->file('upload')->extension()

        ]);
        $product->save();
        return redirect('products' . '/' . $category_slug)->with('success', '    Asset criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $product)
    {
        //

        $asset = $product->load('tags');
        $tags = Tag::select('id', 'tag_name')->get();
        $category_slug = DB::table('categories')->select('slug')->where('id', '=', $asset->category_id)->value('slug');
        $categories = DB::table('categories')->select('id', 'category_name', 'slug')->where('user_id', '=', Auth::user()->id)->whereNull('categories.deleted_at')->get();

        //show related products
        $allOtherProducts = Asset::inRandomOrder()->where('id', '!=', $product->id)->where('category_id', '=', $product->category_id)->limit(3)->get();

        return view('products.show', compact('asset', 'tags', 'allOtherProducts', 'category_slug', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssetUpdateRequest $request, Asset $product)
    {
        //
        $request->validated();
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        }

        $product->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'slug' => Str::slug($request->get('name')),
            'category_id' => $request->get('category'),
            'upload' => $request->hasFile('upload') ? $request->file('upload')->storeAs('public', time() . '_' . $request->file('upload')->getClientOriginalName()) : $product->upload
        ]);

        return back()->with('success', 'Asset atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore($id)
    {
        $asset = Asset::onlyTrashed()->findOrFail($id);
        $category_slug = DB::table('categories')->where('id', '=', $asset->category_id)->value('slug');
        $asset->restore();
        return redirect('products' . '/' . $category_slug)->with('success', 'Asset restaurado com sucesso!');
    }
    public function forceDelete($id)
    {
        $asset = Asset::onlyTrashed()->findOrFail($id);
        $category_slug = DB::table('categories')->where('id', '=', $asset->category_id)->value('slug');
        if ($asset->upload) {
            Storage::delete($asset->upload);
        }
        $asset->tags()->detach();
        $asset->forceDelete();
        return redirect('products' . '/' . $category_slug)->with('success', 'Asset removido permanentemente com sucesso!');
    }
    public function destroy(Asset $product)
    {
        //
        $category_slug = DB::table('categories')->where('id', '=', $product->category_id)->value('slug');

        $product->delete();
        return redirect('products' . '/' . $category_slug)->with('success', 'Asset removido com sucesso!');
    }
    public function downloadFile(Asset $product)
    {
        $file = Asset::where('id', $product->id)->value('upload');
        return Storage::download($file);
    }
    public function naiveBayes()
    {
        // Retrieve file types and sizes from the database
        $files = Asset::select('id', 'filetype', 'filesize')
            ->where('user_id', Auth::user()->id)
            ->whereNull('deleted_at')
            ->orderBy('filesize')
            ->take(500)
            ->get();

        // Check if files collection is not empty
        if ($files->isEmpty()) {
            Log::error("No files found for user with ID: " . Auth::user()->id);
            return;
        }

        // Prepare the dataset
        $samples = $files->pluck('filesize')->map(function ($size) {
            return [$size];
        })->all();
        $labels = $files->pluck('filetype')->all();

        // Create the dataset
        $dataset = new ArrayDataset($samples, $labels);

        // Split the dataset
        $split = new StratifiedRandomSplit($dataset);

        // Create and Test the Naive Bayes classifier
        $classifier = new NaiveBayes();
        $classifier->train($split->getTrainSamples(), $split->getTrainLabels());

        // Predict file types for test samples
        $predictions = $classifier->predict($samples);
        $classificationRport = new ClassificationReport($labels, $predictions);
        $accuracy = Accuracy::score($labels, $predictions);

        // Update database records with predictions
        foreach ($predictions as $index => $prediction) {
            DB::table('assets')
                ->where('id', $files[$index]->id)
                ->update(['filetype_prediction' => $prediction]);
        }
        dd($classificationRport);
        // Return accuracy and predictions
        return ['accuracy' => $accuracy, 'predictions' => $predictions];
    }
    public function DbScan()
    {
        $samples = [];
        $labels = [];
        // Retrieve file types and sizes from the database
        $files = Asset::select('filesize', 'filetype')
            ->where('user_id', Auth::user()->id)
            ->whereNull('deleted_at')
            ->orderBy('filesize') // Corrected orderby clause
            ->get();
        // Check if files collection is not empty
        if ($files->isEmpty()) {
            Log::error("No files found for user with ID: " . Auth::user()->id);
            return;
        }
        foreach ($files as $file) {
            array_push($labels, $file->filetype);
            array_push($samples, $file->filesize);
        }
        $res = array_fill_keys(array_values($labels),$samples);
        $kmeans = new DBSCAN($epsilon = 2, $minSamples = 3);;
        $potato = $kmeans->cluster($res);
        dd($potato);
    }
}
