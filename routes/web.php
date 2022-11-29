<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// HALAMAN YANG BISA DIAKSES TANPA LOGIN
Route::resource('/', DashboardController::class);
Route::get('/detail/{id}', [App\Http\Controllers\DashboardController::class, 'show'])->name('detail');
Route::resource('/rekomendasi', RekomendasiController::class);


Route::middleware(['auth', 'admin'])->group(function () {

    // CRUD USER
    Route::resource('/user', UserController::class);
    Route::get('/delus/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delus');
});
Route::middleware(['auth'])->group(function () {

    // CRUD KATEGORI
    Route::resource('/kategori', KategoriController::class);
    Route::get('/delkat/{kategori}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('delkat');
    // CRUD PRODUK
    Route::resource('/produk', ProdukController::class);
    Route::get('/delpro/{produk}', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('delpro');
    // CRUD POSTINGAN
    Route::resource('/post', PostController::class);
    Route::get('/delpost/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('delpost');
});
