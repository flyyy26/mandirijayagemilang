<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('whatsapps')->get();
        return view('admin.products.create', compact('products'));
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login'); // Redirect if not authenticated
        }

        $categories = Category::all(); // Ambil semua kategori untuk form
        $whatsapps = Whatsapp::all();
        $products = Product::with('category')->get(); // Ambil semua produk untuk ditampilkan di tabel

        return view('admin.products.create', compact('categories', 'products', 'whatsapps'));
    }

    public function showCategoryProductsPlafon()
    {
        $categoryId = 7; // Specific category ID
        $products = Product::where('category_id', $categoryId)->get(); // Adjust 'category_id' to match your schema

        return view('beranda', compact('products'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', // Validasi foreign key kategori
            'whatsapp_ids' => 'required|array', // Ubah ini menjadi array untuk beberapa ID WhatsApp
            'whatsapp_ids.*' => 'exists:whatsapps,id', // Setiap ID WhatsApp harus valid
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024', // 1024 KB = 1 MB
        ], [
            'image.max' => 'Maksimal gambar 1mb', // Custom error message
        ]);

        // Proses upload gambar produk
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = null;
        }

        // Simpan produk ke database
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'image' => $imagePath,
        ]);

        // Simpan relasi dengan nomor WhatsApp
        $product->whatsapps()->sync($request->input('whatsapp_ids'));

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('admin.products.create')->with('success', 'Produk berhasil ditambahkan!');
    }


    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id', 
            'whatsapp_ids' => 'required|array', // Make sure to validate as an array
            'whatsapp_ids.*' => 'exists:whatsapps,id', // Each ID in the array must exist in the whatsapps table
        ]);

        // Find the product by ID or fail
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        // Update whatsapp_ids relationship
        $product->whatsapps()->sync($request->whatsapp_ids); // Sync the WhatsApp IDs

        // Update the image if a new one is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image && \Storage::exists('public/' . $product->image)) {
                \Storage::delete('public/' . $product->image);
            }
            // Store the new image and update the product
            $product->image = $request->file('image')->store('products', 'public');
        }

        // Save the product
        $product->save();

        // Redirect with a success message
        return redirect()->route('admin.products.create')->with('success', 'Produk berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);
        
        // Delete the product
        $product->delete();

        // Redirect back to the product creation page with a success message
        return redirect()->route('admin.products.create')->with('success', 'Produk berhasil dihapus.');
    }

    public function search(Request $request)
    {
        // Ambil input pencarian
        $query = $request->input('query');

        // Lakukan pencarian pada produk berdasarkan nama dan relasi kategori
        $products = Product::with('category') // eager load kategori
            ->where('name', 'LIKE', '%' . $query . '%')
            ->paginate(10); // menggunakan pagination

        // Kembalikan hasil pencarian dalam bentuk JSON
        return response()->json($products);
    }

}