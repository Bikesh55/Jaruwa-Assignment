<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
   
Route::get('/', function () {
    return view('admin.login');
});

Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin register
Route::get('/register', [AdminController::class, 'index']);
Route::post('/register', [AdminController::class, 'register'])->name('admin.register');

// Admin login
Route::post('/', [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => ['AuthCheck']], function(){

    
    // resource routes for products
    Route::resource('products', ProductController::class);
}); 