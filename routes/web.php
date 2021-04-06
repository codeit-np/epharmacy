<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $medecines = Product::where('category_id',1)->limit(4)->get();
    return view('frontend.pages.index',compact('medecines'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::resource('categories',CategoryController::class);
Route::resource('products',ProductController::class);