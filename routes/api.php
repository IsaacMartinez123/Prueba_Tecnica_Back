<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}',[ProductController::class, 'show'])->name('products.show');
Route::post('/products',[ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}',[ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}',[ProductController::class, 'destroy'])->name('products.destroy');