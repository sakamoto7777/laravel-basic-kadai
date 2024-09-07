<?php

use Illuminate\Support\Facades\Route;
// ルーティングを設定するコントローラを宣言する(hello)
use App\Http\Controllers\HelloController;
// ルーティングを設定するコントローラを宣言する(post)
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SignInController;



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
Route::get('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts/confirm', [PostController::class, 'confirm'])->name('posts.confirm');
Route::resource('posts', PostController::class);


Route::get('/vendors/create', [VendorController::class, 'create']);

Route::post('/Vendors/store', [VendorController::class, 'store'])->name('posts.store');
Route::get('/vendors/{id}', [VendorController::class, 'show']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::get('/requests/create', [RequestController::class, 'create']);
Route::post('/requests/confirm', [RequestController::class, 'confirm'])->name('requests.confirm');

Route::get('/responses', [ResponseController::class, 'index']);
Route::get('/sign-in', [SignInController::class, 'create']);

Route::post('/sign-in', [SignInController::class, 'store'])->name('sign-in.store');
