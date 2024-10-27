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

use App\Models\Product;
use App\Models\Whatsapp;
use App\Models\Category;


Route::get('/', function () {
    $categories = Category::with(['products.whatsapp', 'products.category'])->get();
    $products = Product::where('category_id', 7)->with('whatsapp', 'category')->take(8)->get();
    $productsOrnamen = Product::where('category_id', 8)->with('whatsapp', 'category')->take(8)->get();

    return view('beranda', compact('products', 'productsOrnamen', 'categories'));
});



use App\Http\Controllers\AdminController;

Route::get('/admin-login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin-login', [AdminController::class, 'login']);
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/products', function () {
        return view('admin.products'); // You will create this view later
    })->name('admin.products');

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



use App\Http\Controllers\WhatsappController;
// Route untuk halaman input kategori
    Route::get('/admin/whatsapp/create', [WhatsappController::class, 'create'])->name('admin.whatsapp.create');
    Route::post('/admin/whatsapp', [WhatsappController::class, 'store'])->name('admin.whatsapp.store');
    Route::delete('/admin/whatsapp/{id}', [WhatsappController::class, 'destroy'])->name('admin.whatsapp.destroy');
    Route::get('/admin/whatsapp/{id}/edit', [WhatsappController::class, 'edit'])->name('admin.whatsapp.edit');
    Route::put('/admin/whatsapp/{id}', [WhatsappController::class, 'update'])->name('admin.whatsapp.update');
    Route::get('/admin/whatsapps/search', [WhatsappController::class, 'search'])->name('admin.whatsapp.search');
    Route::get('/admin/whatsapps', [WhatsappController::class, 'index'])->name('admin.whatsapp.index');

use App\Http\Controllers\HotlineController;
    Route::get('/admin/hotline/create', [HotlineController::class, 'create'])->name('admin.hotline.create');
    Route::post('/admin/hotline/store', [HotlineController::class, 'store'])->name('admin.hotline.store');
    Route::get('/admin/hotlines', [HotlineController::class, 'index'])->name('admin.hotline.index');
    Route::delete('/admin/hotline/{id}', [HotlineController::class, 'destroy'])->name('admin.hotline.destroy');
    Route::get('/admin/hotline/{id}/edit', [HotlineController::class, 'edit'])->name('admin.hotline.edit');
    Route::put('/admin/hotline/{id}', [HotlineController::class, 'update'])->name('admin.hotline.update');
