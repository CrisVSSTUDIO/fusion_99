<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer([
            'layouts.app', 'products.create'
        ], function ($view) {
            //gets the autenthicated user   
            if (Auth::check()) {
                $categories = DB::table('categories')->select('id', 'category_name', 'slug')->where('user_id', '=', Auth::user()->id)->whereNull('categories.deleted_at')->get();
                $view->with('categories', $categories);
            }
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
