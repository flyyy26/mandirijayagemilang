<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Ambil semua kategori dari database
        return response()->json($categories); // Kembalikan data dalam format JSON
    }


    public function create()
    {
        // Ambil semua kategori
        $categories = Category::all();

        // Kirim data kategori ke view
        return view('admin.category.create', compact('categories'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'excellence' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        // Upload gambar
        $path = $request->file('image')->store('categories', 'public');

        // Simpan kategori ke database
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'excellence' => $request->excellence,
            'image' => $path,
        ]);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('admin.category.create')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($category->image && \Storage::exists('public/' . $category->image)) {
            \Storage::delete('public/' . $category->image);
        }

        $category->delete();

        return redirect()->route('admin.category.create')->with('success', 'Kategori berhasil dihapus.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        
        // Return data dalam format JSON untuk JavaScript
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'excellence' => 'required',
            'image' => 'nullable|image',
        ]);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->excellence = $request->excellence;

        // Update gambar jika diupload
        if ($request->hasFile('image')) {
            if ($category->image && \Storage::exists('public/' . $category->image)) {
                \Storage::delete('public/' . $category->image);
            }
            $category->image = $request->file('image')->store('categories', 'public');
        }

        $category->save();

        return redirect()->route('admin.category.create')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function search(Request $request)
    {
        // Ambil input pencarian
        $query = $request->input('query');

        // Lakukan pencarian pada nama kategori
        $categories = Category::where('name', 'LIKE', '%' . $query . '%')->paginate(10); // menggunakan pagination

        // Kembalikan hasil pencarian dalam bentuk JSON
        return response()->json($categories);
    }
}

