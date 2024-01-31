<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/{id?}/{type?}',[HomeController::class, 'category'])->name('category');
Route::get('/product/{id?}',[HomeController::class, 'products'])->name('product');
Route::post('/addtocart',[HomeController::class, 'add_to_cart'])->name('addtocart');
Route::get('/yourcart',[HomeController::class, 'cart'])->middleware('auth')->name('cart');
Route::patch('/updateqty',[HomeController::class, 'updateqty'])->middleware('auth')->name('updatecart');
Route::post('/deletefromcart',[HomeController::class, 'ajaxcartdel'])->middleware('auth')->name('deletefromcart');

Route::get('/checkout',[HomeController::class, 'checkout'])->middleware('auth')->name('checkout');
Route::post('/shippingaddress',[HomeController::class, 'shippingaddress'])->middleware('auth')->name('shipaddress');
Route::get('/ordersuccess',[HomeController::class, 'ordersuccess'])->middleware('auth')->name('ordersuccess');


Route::get('/admin/dashboard',function(){
    return view('admin/dashboard');
})->middleware('auth:admin')->name('admin.dashboard');;

Route::get('/admin/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category');
Route::get('/admin/category/add', [App\Http\Controllers\CategoryController::class, 'add'])->middleware('auth:admin')->name('admin.category.add');
Route::post('/admin/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->middleware('auth:admin')->name('admin.category.store');
Route::get('/admin/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->middleware('auth:admin')->name('admin.category.edit');
Route::post('/admin/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->middleware('auth:admin')->name('admin.category.update');
Route::get('/admin/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->middleware('auth:admin')->name('admin.category.delete');

Route::get('/admin/subcategory', [App\Http\Controllers\SubcategoryController::class, 'index'])->middleware('auth:admin')->name('admin.subcategory');
Route::get('/admin/subcategory/add', [App\Http\Controllers\SubcategoryController::class, 'add'])->middleware('auth:admin')->name('admin.subcategory.add');
Route::post('/admin/subcategory/store', [App\Http\Controllers\SubcategoryController::class, 'store'])->middleware('auth:admin')->name('admin.subcategory.store');
Route::get('/admin/subcategory/edit/{id}', [App\Http\Controllers\SubcategoryController::class, 'edit'])->middleware('auth:admin')->name('admin.subcategory.edit');
Route::post('/admin/subcategory/update/{id}', [App\Http\Controllers\SubcategoryController::class, 'update'])->middleware('auth:admin')->name('admin.subcategory.update');
Route::get('/admin/subcategory/delete/{id}', [App\Http\Controllers\SubcategoryController::class, 'delete'])->middleware('auth:admin')->name('admin.subcategory.delete');

Route::get('/admin/banner', [App\Http\Controllers\BannerController::class, 'index'])->middleware('auth:admin')->name('admin.banner');
Route::get('/admin/banner/add', [App\Http\Controllers\BannerController::class, 'add'])->middleware('auth:admin')->name('admin.banner.add');
Route::post('/admin/banner/store', [App\Http\Controllers\BannerController::class, 'store'])->middleware('auth:admin')->name('admin.banner.store');
Route::get('/admin/banner/edit/{id}', [App\Http\Controllers\BannerController::class, 'edit'])->middleware('auth:admin')->name('admin.banner.edit');
Route::post('/admin/banner/update/{id}', [App\Http\Controllers\BannerController::class, 'update'])->middleware('auth:admin')->name('admin.banner.update');
Route::get('/admin/banner/delete/{id}', [App\Http\Controllers\BannerController::class, 'delete'])->middleware('auth:admin')->name('admin.banner.delete');

Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth:admin')->name('admin.products');
Route::get('/admin/products/add', [App\Http\Controllers\ProductController::class, 'add'])->middleware('auth:admin')->name('admin.products.add');
Route::post('/admin/products/store', [App\Http\Controllers\ProductController::class, 'store'])->middleware('auth:admin')->name('admin.products.store');
Route::get('/admin/products/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->middleware('auth:admin')->name('admin.products.edit');
Route::post('/admin/products/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->middleware('auth:admin')->name('admin.products.update');
Route::get('/admin/products/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->middleware('auth:admin')->name('admin.products.delete');
Route::post('/admin/getsubcategory', [App\Http\Controllers\ProductController::class, 'getsubcategory'])->middleware('auth:admin')->name('admin.ajaxsubcategory');
Route::post('/admin/gallerydelete', [App\Http\Controllers\ProductController::class, 'ajaxgallerydelete'])->middleware('auth:admin')->name('admin.gallerydelete');


Route::get('/admin/sitesetting', [App\Http\Controllers\SitesettingController::class, 'index'])->middleware('auth:admin')->name('admin.sitesetting');

 Route::post('/admin/sitesetting/store/{id}', [App\Http\Controllers\SitesettingController::class, 'store'])->middleware('auth:admin')->name('admin.sitesetting.store');
