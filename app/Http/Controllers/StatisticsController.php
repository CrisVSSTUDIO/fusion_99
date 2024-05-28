<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Asset;
use App\Models\Category;
use Illuminate\Support\Arr;
use Phpml\Clustering\DBSCAN;
use Phpml\Clustering\KMeans;
use Phpml\Association\Apriori;
use Illuminate\Support\Facades\DB;
use Phpml\Math\Distance\Minkowski;
use Phpml\Regression\LeastSquares;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Phpml\Tokenization\WhitespaceTokenizer;
use Phpml\FeatureExtraction\TokenCountVectorizer;

class StatisticsController extends Controller
{
    //
    public function index()
    {


        $averageProductsPerDay = round($this->averageAssets());
        //list($isVirtual, $isNotVirtual) = $this->virtualCategories();
        list($product_name, $product_count) = $this->assetPerCategory();
        list($perYear, $yearCount) = $this->assetsPerDate();
        list($apriori) = $this->patterns();
        return view('statistics.index', ['created_at' => json_encode($product_name), 'rowcount' => json_encode($product_count), 'averageProductsPerDay' => $averageProductsPerDay, 'perYear' => json_encode($perYear), 'yearCount' => json_encode($yearCount), 'apriori' => json_encode($apriori)]);
    }
    public function assetPerCategory()
    {
        //this function here, does a "traditional" sql query to get the date and counting the number of elements found, grouping them by date and fetching the data in an efficient way.
        //it will  be used for statistics
        $products = DB::table('assets')
            ->join('categories', 'assets.category_id', '=', 'categories.id')
            ->select('categories.category_name', DB::raw('count(*) as total'))
            ->where('categories.user_id', '=', Auth::user()->id)
            ->groupBy('categories.category_name')
            ->take(5000)->get();
        if (count($products)) {
            foreach ($products as $product) {
                $product_name[] = $product->category_name;
                $product_count[] = $product->total;
            }
            return array($product_name, $product_count);
        }
    }





    public function assetsPerDate()
    {
        try {
            $prevNextFiveYears = Date('Y') + 5;
            $multi_array = array();
            $productsCount = Asset::selectRaw('strftime("%Y",created_at) as date, COUNT(*) as count')
                ->groupBy('date')
                ->take(5000)->get();
            if (count($productsCount)) {
                foreach ($productsCount as $productPerYear) {
                    $perYear[] = $productPerYear->date;
                    $yearCount[] = $productPerYear->count;
                }
                foreach ($perYear as $year) {
                    $multi_array[] = array($year);
                }
                $regression = new LeastSquares();
                $regression->train($multi_array, $yearCount);
                $predict_value = $regression->predict([$prevNextFiveYears]);
                array_push($yearCount, $predict_value);
                array_push($perYear, $prevNextFiveYears);
                return array($yearCount, $perYear);
            }
        } catch (Exception $e) {
            Redirect::to('/')->withErrors([$e->getMessage()]);
        }
    }

    public function averageAssets()
    {
        $productsCount = Asset::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->cursor();
        if (count($productsCount)) {
            $averageProductsPerDay = $productsCount->sum('count') / $productsCount->count();
            return $averageProductsPerDay;
        }
    }

    /* public function virtualCategories()
    {

        $virtualCount = Category::select('category_name', 'virtuality')->groupBy('category_name', 'virtuality')->cursor();
        $isVirtual = [];
        $isNotVirtual = [];
        foreach ($virtualCount as $virtual) {
            if ($virtual->virtuality == 1) {
                $isVirtual[] = $virtual->category_name;
            } else {
                $isNotVirtual[] = $virtual->category_name;
            }
        }

        return array(count($isVirtual), count($isNotVirtual));
    }*/

    public function runPythonScript()
    {
        $arg1 = "potato";
        $arg2 = "fdjdf";
        $result = shell_exec("python /path/to/your/python/script.py " . escapeshellarg($arg1) . " " . escapeshellarg($arg2));
        return $result;
    }
    public function patterns()
    {
        $associator = new Apriori($support = 0.5, $confidence = 0.5);
        $samples = [];
        $labels  = [];
        $uploads = Asset::select('upload')->take(5000)->get();
        if (count($uploads)) {
            foreach ($uploads as $upload) {
                $filextension[] = pathinfo($upload->upload, PATHINFO_EXTENSION);
            }
            array_push($samples, $filextension);
            $associator->train($samples, $labels);
            //dd($associator->getRules()) ;
            //dd($associator->apriori());
            return array($associator->apriori());
        }
    }
    
}
