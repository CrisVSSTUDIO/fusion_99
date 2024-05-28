<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $tipo = $request->input('tipo'); //gets the request
        $search = $request->search;
        switch ($tipo) {
            case 'produtos':
                // it searchs the products base on the name or description or even the reference
                $productsearch = Asset::where('name', 'LIKE', '%' .  $request->search . '%')->orWhere('description', 'LIKE', '%' .  $request->search . '%')->cursorPaginate(16);
                $rowcount = count($productsearch);
                return view('products.index', ['productsearch' => $productsearch, 'rowcount' => $rowcount]);
                break;
            case 'tags':
                $tagsearch = Tag::where('tag_name', 'LIKE', '%' .  $request->search . '%')->cursorPaginate(16);
                $rowcount =  count($tagsearch);
                return view('tags.index', ['tagsearch' => $tagsearch, 'rowcount' => $rowcount]);
                break;
            case 'productags':
                $productags =  Asset::with(['tags'])->WhereHas('tags', function ($query) use ($search) {
                    $query->where('tag_name', 'LIKE', '%' . $search . '%');
                })->get();
                $rowcount = count($productags);
                return view('tags.index', ['productags' => $productags, 'rowcount' => $rowcount]);
                break;
            case 'categorias':
                // Pesquisar categorias
                $categoriesearch = Category::where('category_name', 'like', '%' . $request->search . '%')->orWhere('category_description', 'LIKE', '%' . $request->search . '%')->cursorPaginate(16);
                $rowcount =  count($categoriesearch);
                return view('categories.index', ['categoriesearch' => $categoriesearch, 'rowcount' => $rowcount]);
                break;
            default:
                return back()->withInput()->withErrors(['tipo' => 'Tipo inválido']);
        }
    }
}
