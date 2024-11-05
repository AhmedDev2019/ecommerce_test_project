<?php

use Illuminate\Support\Facades\Route;

// Import Controllers ...
use App\Http\Controllers\CategoryController;


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

});