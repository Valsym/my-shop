<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\MainPageController;

Route::get('/products', [ProductController::class, 'index']);
//Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/{code}', [ProductController::class, 'showByCode']);
Route::get('/main', [MainPageController::class, 'index']);
