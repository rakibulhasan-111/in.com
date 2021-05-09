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

Route::get('/buy', [ProductController::class,'cat']);

Route::get('/buy/All', [ProductController::class,'cat'])->middleware('auth');

Route::get('/sell', [ProductController::class,'create'])->middleware('auth');

Route::get('/myadds', [ProductController::class,'myadds'])->middleware('auth');

Route::get('/buy/{cat}', [ProductController::class,'show']);

Route::get('/edit/{id_number}', [ProductController::class,'edit'])->name('edit');

Route::post('/update/{id_number}', [ProductController::class,'update'])->name('update');

Route::get('/delete/{id_number}', [ProductController::class,'destroy'])->name('delete');

Route::post('/',[ProductController::class,'store'] )->name('store');

Route::get('/showSingleProduct/{id_number}', [ProductController::class,'showSingleProduct'])->name('showSingleProduct')->middleware('auth');

Route::get('/addFavorite/{id_number}', [ProductController::class,'addFavorite'])->name('addFavorite');

Route::get('/myfavorites', [ProductController::class,'myfavorites'])->name('myfavorites');

Route::get('/removeFromFavorite/{favorite_id}',[ProductController::class,'removeFromFavorite'])->name('removeFromFavorite');


Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about')->middleware('verified');
Route::post('/about/passwordchange',[App\Http\Controllers\HomeController::class,'change'])->name('about.passwordchange');

