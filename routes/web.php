<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum'])->group(function(){
    Route::resource('category', CategoryController::class);
    Route::get('/api/categories', [CategoryController::class,'getCategoriesJson']);
    Route::resource('brand', BrandController::class);
    Route::resource('size', SizeController::class);
    Route::resource('product', ProductController::class);
});
