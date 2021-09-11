<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReturnProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('user', UserController::class);

    Route::resource('category', CategoryController::class);
    Route::get('/api/categories', [CategoryController::class,'getCategoriesJson']);

    Route::resource('brand', BrandController::class);
    Route::get('/api/brands', [BrandController::class,'getBrandsJson']);

    Route::resource('size', SizeController::class);
    Route::get('/api/sizes', [SizeController::class,'getSizesJson']);

    Route::resource('product', ProductController::class);
    Route::get('/api/products', [ProductController::class,'getProductsJson']);

    Route::get('/stock', [StockController::class, 'stock'])->name('stock');
    Route::post('/stocks', [StockController::class, 'stockSubmit'])->name('stockSubmit');
    Route::get('/stocks/history', [StockController::class, 'stockHistory'])->name('stockHistory');

    Route::get('/return-product', [ReturnProductController::class, 'returnProduct'])->name('returnProduct');
    Route::post('/return-product', [ReturnProductController::class, 'returnProductSubmit'])->name('returnProductSubmit');
    Route::get('/return-product/history', [ReturnProductController::class, 'returnProductkHistory'])->name('returnProductkHistory');
});
