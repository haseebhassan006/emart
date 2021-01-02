<?php

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



Route::get('/', [App\Http\Controllers\FrontController\HomePageController::class, 'index']);
Route::get('category/{id}',[App\Http\Controllers\FrontController\HomePageController::class, 'categoryWiseProduct'])->name('category.wise.product');
Route::post('loadmore',[App\Http\Controllers\FrontController\HomePageController::class, 'loadMoreProduct'])->name('loadmore.product');
Route::post('search',[App\Http\Controllers\FrontController\HomePageController::class, 'search'])->name('search.product');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin.')->group(function () {

     Route::middleware('auth:admin')->group(function () {
     	Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
        //Category Routes
        Route::get('/category',[App\Http\Controllers\Admin\CategoryController::class,'index'])->name('category.index');
        Route::get('/category/create',[App\Http\Controllers\Admin\CategoryController::class,'create'])->name('category.create');
        Route::post('/category',[App\Http\Controllers\Admin\CategoryController::class,'store'])->name('category.store');
        Route::delete('/category/{id}',[App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('category.destroy');
        Route::get('/category/edit/{category}',[App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('category.edit');
        Route::post('/category/update/{id}',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('category.update');



        //Product
         Route::get('/product',[App\Http\Controllers\Admin\ProductController::class,'index'])->name('product.index');
        Route::get('/product/create',[App\Http\Controllers\Admin\ProductController::class,'create'])->name('product.create');
        Route::post('/product',[App\Http\Controllers\Admin\ProductController::class,'store'])->name('product.store');
        Route::delete('/product/{id}',[App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('product.destroy');
        Route::get('/product/edit/{id}',[App\Http\Controllers\Admin\ProductController::class,'edit'])->name('product.edit');
        Route::post('/product/{id}/update',[App\Http\Controllers\Admin\ProductController::class,'update'])->name('product.update');

        //Brand
        Route::get('/brand',[App\Http\Controllers\Admin\BrandController::class,'index'])->name('brand.index');
        Route::get('/brand/create',[App\Http\Controllers\Admin\BrandController::class,'create'])->name('brand.create');
        Route::post('/brand',[App\Http\Controllers\Admin\BrandController::class,'store'])->name('brand.store');
        Route::delete('/brand/{id}',[App\Http\Controllers\Admin\BrandController::class,'destroy'])->name('brand.destroy');
        Route::get('/brand/edit/{id}',[App\Http\Controllers\Admin\brandController::class,'edit'])->name('brand.edit');
        Route::put('/brand/{id}/update',[App\Http\Controllers\Admin\BrandController::class,'update'])->name('brand.update');

         //Tag
        Route::get('/tag',[App\Http\Controllers\Admin\TagController::class,'index'])->name('tag.index');
        Route::get('/tag/create',[App\Http\Controllers\Admin\TagController::class,'create'])->name('tag.create');
        Route::post('/tag',[App\Http\Controllers\Admin\TagController::class,'store'])->name('tag.store');
        Route::delete('/tag/{id}',[App\Http\Controllers\Admin\TagController::class,'destroy'])->name('tag.destroy');
        Route::get('/tag/edit/{id}',[App\Http\Controllers\Admin\TagController::class,'edit'])->name('tag.edit');
        Route::put('/tag/{id}/update',[App\Http\Controllers\Admin\TagController::class,'update'])->name('tag.update');

        // Attributes Route

        Route::get('/attributes',[App\Http\Controllers\Admin\AttributeController::class,'index'])->name('attributes.index');
        Route::get('/attributes/create',[App\Http\Controllers\Admin\AttributeController::class,'create'])->name('attributes.create');
        Route::post('/attributes/add/country',[App\Http\Controllers\Admin\AttributeController::class,'addCountry'])->name('attributes.add.country');
        Route::post('/attributes/add/state',[App\Http\Controllers\Admin\AttributeController::class,'addState'])->name('attributes.add.state');
        Route::post('/attributes/add/city',[App\Http\Controllers\Admin\AttributeController::class,'addCity'])->name('attributes.add.city');
        Route::post('/attributes/add/size',[App\Http\Controllers\Admin\AttributeController::class,'addSize'])->name('attributes.add.size');
  
        // Uses first & second middleware...
    });
	

	Route::namespace('Auth')->group(function(){
        
    //Login Routes
    Route::get('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'login']);
    Route::post('/logout',[App\Http\Controllers\Admin\Auth\LoginController::class,'logout'])->name('logout');

    //Forgot Password Routes
   /* Route::get('/password/reset',[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email',[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');*/

    //Reset Password Routes
    Route::get('/password/reset/{token}',[App\Http\Controllers\Admin\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('/password/reset',[App\Http\Controllers\Admin\Auth\ResetPasswordController::class,'reset'])->name('password.update');

});
 });

Route::prefix('user')->name('user.')->group(function () {
    Route::middleware('auth')->group(function(){
         Route::get('profile',[App\Http\Controllers\User\UserController::class,'profile'])->name('profile');




    });
});


