<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Whatsapp;

class AdminController extends Controller
{
    public function dashboard()
    {
        $products = Product::paginate(5); 
        $categories = Category::paginate(5);// Fetch all products from the database
        $productCount = Product::count();
        $categoryCount = Category::count();
        $whatsappCount = Whatsapp::count();
        return view('admin.dashboard', compact('products', 'categories', 'productCount', 'categoryCount', 'whatsappCount')); // Pass products to the view
    }
    public function showLoginForm()
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) { 
            return redirect()->route('admin.dashboard'); // Arahkan ke dashboard jika sudah login
        }

        return view('admin.login'); // Tampilkan halaman login jika belum login
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('admin-login');
    }

}

