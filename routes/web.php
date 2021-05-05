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

use App\Http\Controllers\ProductController; 

Route::get('/', [ProductController::class,'index']);

Route::get('/buy', [ProductController::class,'cat'])->middleware('auth');

Route::get('/buy/All', [ProductController::class,'cat'])->middleware('auth');

Route::get('/sell', [ProductController::class,'create'])->middleware('auth');

Route::get('/myadds', [ProductController::class,'myadds'])->middleware('auth');

Route::get('/buy/{cat}', [ProductController::class,'show'])->middleware('auth');

Route::get('/edit/{id_number}', [ProductController::class,'edit'])->name('products.edit');

Route::post('/update/{id_number}', [ProductController::class,'update'])->name('products.update');

Route::get('/delete/{id_number}', [ProductController::class,'destroy'])->name('products.delete');

Route::post('/',[ProductController::class,'store'] )->name('products.store') ;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

