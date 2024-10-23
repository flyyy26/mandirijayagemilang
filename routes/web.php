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

Route::get('/', function () {
    return view('beranda');
});

use App\Http\Controllers\AdminController;

Route::get('/admin-login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin-login', [AdminController::class, 'login']);
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Tambahkan route untuk halaman produk
    Route::get('/admin/products', function () {
        return view('admin.products'); // Anda akan membuat view ini
    })->name('admin.products');

    // Tambahkan route logout di sini juga
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

use App\Http\Controllers\CategoryController;

    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/categories/search', [CategoryController::class, 'search'])->name('admin.category.search');
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');


use App\Http\Controllers\ProductController;
    // Form upload produk
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');

    // Proses penyimpanan produk
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('/admin/products/search', [ProductController::class, 'search'])->name('admin.products.search');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');

