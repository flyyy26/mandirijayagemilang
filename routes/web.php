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
use App\Models\Hotline;
use App\Models\Social;
use App\Models\Slideshow;
use App\Models\Video;

Route::get('/whatsapp-numbers/{product}', function (Product $product) {
    return response()->json($product->whatsapps); // Assuming the relationship is defined in the Product model
});


// In the route or controller:
Route::get('/', function () {
    $categories = Category::with(['products.category'])->get();
    $products = Product::where('category_id', 7)->with('category')->take(8)->get();
    $productsOrnamen = Product::where('category_id', 8)->with('category')->take(8)->get();

    // Fetch WhatsApp numbers and the first hotline entry
    $whatsapps = WhatsApp::all();
    $socials = Social::all();
    $slideshows = Slideshow::all();
    $videos = Video::latest()->first();
    $hotline = Hotline::first(); // Get only the first hotline

    return view('beranda', compact('products', 'productsOrnamen', 'categories', 'whatsapps', 'hotline', 'socials', 'slideshows', 'videos'));
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

use App\Http\Controllers\SlideshowController;

    Route::get('/admin/slideshow/create', [SlideshowController::class, 'create'])->name('admin.slideshow.create');
    Route::post('/admin/slideshow/store', [SlideshowController::class, 'store'])->name('admin.slideshow.store');
    Route::delete('/admin/slideshow/{id}', [SlideshowController::class, 'destroy'])->name('admin.slideshow.destroy');
    Route::get('/admin/slideshow/{id}/edit', [SlideshowController::class, 'edit'])->name('admin.slideshow.edit');
    Route::put('/admin/slideshow/{id}', [SlideshowController::class, 'update'])->name('admin.slideshow.update');
    Route::get('/admin/slideshow/search', [SlideshowController::class, 'search'])->name('admin.slideshow.search');
    Route::get('/admin/slideshow', [SlideshowController::class, 'index'])->name('admin.slideshow.index');


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

use App\Http\Controllers\SocialController;
// Route untuk halaman input kategori
    Route::get('/admin/social/create', [SocialController::class, 'create'])->name('admin.social.create');
    Route::post('/admin/social', [SocialController::class, 'store'])->name('admin.social.store');
    Route::delete('/admin/social/{id}', [SocialController::class, 'destroy'])->name('admin.social.destroy');
    Route::get('/admin/social/{id}/edit', [SocialController::class, 'edit'])->name('admin.social.edit');
    Route::put('/admin/social/{id}', [SocialController::class, 'update'])->name('admin.social.update');
    Route::get('/admin/social/search', [SocialController::class, 'search'])->name('admin.social.search');
    Route::get('/admin/social', [SocialController::class, 'index'])->name('admin.social.index');

use App\Http\Controllers\HotlineController;
    Route::get('/admin/hotline/create', [HotlineController::class, 'create'])->name('admin.hotline.create');
    Route::post('/admin/hotline/store', [HotlineController::class, 'store'])->name('admin.hotline.store');
    Route::get('/admin/hotlines', [HotlineController::class, 'index'])->name('admin.hotline.index');
    Route::delete('/admin/hotline/{id}', [HotlineController::class, 'destroy'])->name('admin.hotline.destroy');
    Route::get('/admin/hotline/{id}/edit', [HotlineController::class, 'edit'])->name('admin.hotline.edit');
    Route::put('/admin/hotline/{id}', [HotlineController::class, 'update'])->name('admin.hotline.update');

use App\Http\Controllers\VideoController;
    Route::get('/admin/video/create', [VideoController::class, 'create'])->name('admin.video.create');
    Route::post('/admin/video/store', [VideoController::class, 'store'])->name('admin.video.store');
    Route::get('/admin/video', [VideoController::class, 'index'])->name('admin.video.index');
    Route::delete('/admin/video/{id}', [VideoController::class, 'destroy'])->name('admin.video.destroy');
    Route::get('/admin/video/{id}/edit', [VideoController::class, 'edit'])->name('admin.video.edit');
    Route::put('/admin/video/{id}', [VideoController::class, 'update'])->name('admin.video.update');