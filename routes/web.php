<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductListController;
use App\Models\Cart;
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
    $baby = Product::where('category_id',2)->limit(4)->get();
    $beauty = Product::where('category_id',3)->limit(4)->get();
    $nutrition = Product::where('category_id',4)->limit(4)->get();
    return view('frontend.pages.index',compact('medecines','baby','beauty','nutrition'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::resource('categories',CategoryController::class);
Route::resource('products',ProductController::class);
Route::get('productlist/{id}',[ProductListController::class,'getList']);
Route::resource('carts',CartController::class)->middleware('clientauth');