<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryPostRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
        $categories = Category::where('user_id', '=', Auth::user()->id)->cursorPaginate();
        $rowcount = count($categories);
        return view('categories.index', compact('categories', 'rowcount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryPostRequest $request)
    {
        //

        $request->validated();
        $category = new Category([
            'category_name' => $request->get('category_name'),
            'category_description' => $request->get('category_description'),
            'slug' => Str::slug($request->get('category_name')),
            'user_id' => Auth::id()

        ]);
        $category->save();
        return redirect('/categories')->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //

        //return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        //
        $request->validated();
        $category->update([
            'category_name' => $request->get('category_name'),
            'category_description' => $request->get('category_description'),
            'slug' => Str::slug($request->get('category_name')),
            'user_id' => Auth::id()
        ]);

        return back()->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);

        $category->restore();
        return redirect('/categories')->with('success', 'Categoria restaurada com sucesso!');
    }
    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);

        $category->forceDelete();
        return redirect('/categoreis')->with('success', 'Categoria removida permanentemente com sucesso!');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/categories')->with('success', 'Categoria removida com sucesso!'); //writes this message
    }
}
