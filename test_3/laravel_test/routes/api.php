<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;

Route::resource("carts", CartController::class);
Route::resource("products", ProductController::class);
Route::resource("categories", ProductCategoryController::class);
