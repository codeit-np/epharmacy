<?php

use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientRegister;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\SpecializationController;
use App\Models\Cart;
use App\Models\Pharmacy;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    if(Auth::user()){
        $totalCartItem = Cart::where('user_id',auth()->user()->id)->count();
    }else{
        $totalCartItem = 0;
    }
  

    $medecines = Product::where('category_id',1)->limit(4)->get();
    $baby = Product::where('category_id',2)->limit(4)->get();
    $beauty = Product::where('category_id',3)->limit(4)->get();
    $nutrition = Product::where('category_id',4)->limit(4)->get();
   
  
    return view('frontend.pages.index',compact('medecines','baby','beauty','nutrition','totalCartItem'));
});

Route::get('/contact',function(){
    
    return view('frontend.pages.contact');
});

Route::get('/pharmacylist',function(){
    $pharmacy = Pharmacy::all();
    return view('frontend.pages.pharmacylist',compact('pharmacy'));
});

Route::view('/clientregister','frontend.pages.clientregister');
Route::resource('registerclient',ClientRegister::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::resource('categories',CategoryController::class);
Route::resource('products',ProductController::class);
Route::get('productlist/{id}',[ProductListController::class,'getList']);
Route::resource('carts',CartController::class)->middleware('clientauth');
Route::resource('invoices',InvoiceController::class);

Route::resource('specializations',SpecializationController::class);
Route::resource('doctorslst',DoctorController::class);


Route::get('doctorslist',[PageController::class,'doctors']);
Route::resource('appointments',AppointmentController::class);
Route::resource('adminappointments',AdminAppointmentController::class);
Route::resource('pharmacy',PharmacyController::class);