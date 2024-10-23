<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori untuk form
        $products = Product::with('category')->get(); // Ambil semua produk untuk ditampilkan di tabel

        return view('admin.products.create', compact('categories', 'products'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', // Validasi foreign key kategori
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses upload gambar produk
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = null;
        }

        // Simpan produk ke database
        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'image' => $imagePath,
        ]);

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('admin.products.create')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id' // Validasi kategori
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id; // Simpan kategori

        // Update gambar jika di-upload
        if ($request->hasFile('image')) {
            if ($product->image && \Storage::exists('public/' . $product->image)) {
                \Storage::delete('public/' . $product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

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