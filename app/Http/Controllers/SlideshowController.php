<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;
use App\Models\Video;
use App\Http\Controllers\Controller;

class SlideshowController extends Controller
{
    public function index()
    {
        $slideshows = Slideshow::all(); // Ambil semua slideshow dari database
        $videos = Video::all(); // Ambil semua video dari database
        
        return response()->json([
            'slideshows' => $slideshows,
            'videos' => $videos
        ]);
    }


    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login'); // Redirect if not authenticated
        }
        // Ambil semua kategori
        $slideshows = Slideshow::all();
        $video = Video::latest()->first(); // Ambil video terbaru

        // Kirim data kategori ke view
        return view('admin.slideshow.create', compact('slideshows', 'video'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'heading' => 'nullable|string',
            'link' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1048',
            'image_mobile' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:1048',
        ]);

        // Upload gambar
        $path = $request->file('image')->store('slideshows', 'public');

        // Simpan kategori ke database
        Slideshow::create([
            'heading' => $request->heading,
            'link' => $request->link,
            'image' => $path,
            'image_mobile' => $path,
        ]);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('admin.slideshow.create')->with('success', 'Slideshow berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $slideshows = Slideshow::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($slideshows->image && \Storage::exists('public/' . $slideshows->image)) {
            \Storage::delete('public/' . $slideshows->image);
        }

        if ($slideshows->image_mobile && \Storage::exists('public/' . $slideshows->image_mobile)) {
            \Storage::delete('public/' . $slideshows->image_mobile);
        }

        $slideshows->delete();

        return redirect()->route('admin.slideshow.create')->with('success', 'Slide berhasil dihapus.');
    }

    public function edit($id)
    {
        $slideshows = Slideshow::findOrFail($id);
        
        // Return data dalam format JSON untuk JavaScript
        return response()->json($slideshows);
    }

    public function update(Request $request, $id)
    {
        $slideshows = Slideshow::findOrFail($id);

        $request->validate([
            'heading' => 'nullable|string',
            'link' => 'nullable|string',
            'image' => 'nullable|image',
            'image_mobile' => 'nullable|image',
        ]);

        $slideshows->heading = $request->heading;
        $slideshows->link = $request->link;

        // Update gambar jika diupload
        if ($request->hasFile('image')) {
            if ($slideshows->image && \Storage::exists('public/' . $slideshows->image)) {
                \Storage::delete('public/' . $slideshows->image);
            }
            $slideshows->image = $request->file('image')->store('slideshows', 'public');
        }

        if ($request->hasFile('image_mobile')) {
            if ($slideshows->image_mobile && \Storage::exists('public/' . $slideshows->image_mobile)) {
                \Storage::delete('public/' . $slideshows->image_mobile);
            }
            $slideshows->image_mobile = $request->file('image_mobile')->store('slideshows', 'public');
        }

        $slideshows->save();

        return redirect()->route('admin.slideshow.create')->with('success', 'Slide berhasil diperbarui.');
    }

    public function search(Request $request)
    {
        // Ambil input pencarian
        $query = $request->input('query');

        // Lakukan pencarian pada nama kategori
        $slideshows = Slideshow::where('name', 'LIKE', '%' . $query . '%')->paginate(10); // menggunakan pagination

        // Kembalikan hasil pencarian dalam bentuk JSON
        return response()->json($slideshows);
    }
}

