<?php

use Illuminate\Support\Facades\Route;

// Import Controllers ...
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Authenticated Routes .
Route::group(['middleware' => 'auth:web'] , function(){

    // Categories Routes .
    Route::group(['prefix' => 'categories'] , function(){
        Route::get('/' , [CategoryController::class,'index'])->name('categories.index');
        Route::get('/create' , [CategoryController::class,'create'])->name('categories.create');
        Route::post('/store' , [CategoryController::class,'store'])->name('categories.store');
        Route::get('/edit/{category}' , [CategoryController::class,'edit'])->name('categories.edit');
        Route::put('/update/{category}' , [CategoryController::class,'update'])->name('categories.update');
        Route::delete('/destroy/{category}' , [CategoryController::class,'destroy'])->name('categories.destroy');
    });

    // Products Routes .
    Route::group(['prefix' => 'products'] , function(){
        Route::get('/' , [ProductController::class,'index'])->name('products.index');
        Route::get('/create' , [ProductController::class,'create'])->name('products.create');
        Route::post('/store' , [ProductController::class,'store'])->name('products.store');
        Route::get('/show/{product}' , [ProductController::class,'show'])->name('products.show');
        Route::get('/edit/{product}' , [ProductController::class,'edit'])->name('products.edit');
        Route::put('/update/{product}' , [ProductController::class,'update'])->name('products.update');
        Route::delete('/destroy/{product}' , [ProductController::class,'destroy'])->name('products.destroy');
    });

});