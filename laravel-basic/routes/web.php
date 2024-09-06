<?php

use Illuminate\Support\Facades\Route;
// ルーティングを設定するコントローラを宣言する(hello)
use App\Http\Controllers\HelloController;
 // ルーティングを設定するコントローラを宣言する(post)
 use App\Http\Controllers\PostController;
 use App\Http\Controllers\ProductController;
 use App\Http\Controllers\VendorController;


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
  return view('welcome');
});

Route::get('/hello', [HelloController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/vendors/{id}', [VendorController::class, 'show']);


