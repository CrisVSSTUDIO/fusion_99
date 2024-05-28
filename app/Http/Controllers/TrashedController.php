<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TrashedController extends Controller
{
    public function index()
    {
        $productsCrapped = DB::table('assets')->join('categories', 'assets.category_id', '=', 'categories.id')->where('categories.user_id', '=', Auth::user()->id)->select('assets.*')->whereNotNull('assets.deleted_at')->get();
        $categoriesCrapped=Category::where('user_id', '=', Auth::user()->id)->onlyTrashed()->get();
        return view('trashed.index', compact('productsCrapped','categoriesCrapped'));
    }
}
