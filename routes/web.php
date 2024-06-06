<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrashedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::get('/email/verify', function () {

    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {

    $request->user()->sendEmailVerificationNotification();

    return back()->with('resent', 'Verification link sent ');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verification-notification', function () {
    // Logic to resend the verification notification
})->middleware(['throttle:6,1'])->name('verification.resend');

Route::get('/', [ProductController::class, 'getLatestWallpaper'])->name('home');

Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/super', [AdminController::class, 'index'])->name('super');
    Route::resource('tickets', TicketController::class);

    Route::get('/analytics', [StatisticsController::class, 'index'])->name('analytics');
    Route::prefix('products')->group(function () {
        Route::get('/all', [ProductController::class, 'getAllAssets'])->name('allassets');
        Route::get('/{category:slug}', [ProductController::class, 'index'])->name('categorized');
        Route::get('/download/{product:slug}', [ProductController::class, 'downloadFile'])->name('download');
        Route::post('/{id}/restore', [ProductController::class, 'restore'])->name('restoreasset');
        Route::post('/{id}/forcedelete', [ProductController::class, 'forceDelete'])->name('deleteasset');
        Route::get('/naive-bayes', [ProductController::class, 'naiveBayes'])->name('naive-bayes');
        Route::get('/k-means', [ProductController::class, 'kMeans'])->name('k-means');

        Route::resource('products', ProductController::class);
    });

    Route::get('/trashed', [TrashedController::class, 'index'])->name('trashed');

    Route::post('/{id}/restore', [CategoryController::class, 'restore'])->name('restorecat');
    Route::post('/{id}/forcedelete', [CategoryController::class, 'forceDelete'])->name('deletecat');
    Route::resource('categories', CategoryController::class);

    // Route::get('/categories/{category}/products', ['CategoryController', 'index']);

    Route::post('/search', [SearchController::class, 'index'])->name('search');
    Route::resource('dashboard', UserDashboardController::class);
    Route::resource('tags', TagController::class);
});
Route::get("help", function () {
    return view("help.index", ["appTitle" => "Help Page"]);
})->name('help');
Route::get("terms", function () {
    return view("terms.index", ["appTitle" => "Terms and Conditions"]);
})->name('terms');

Route::prefix('potato')->group(function () {
    Route::get('reboot', function () {
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        dd("done");
        //Artisan::call('key:generate');
    });
    Route::get('migrate', function () {
        Artisan::call('migrate:fresh --seed');
        dd("Fresh migrations done");
    });
});
