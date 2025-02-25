<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::all(); // Ambil semua data sosial media dari database
        return response()->json($socials); // Kembalikan data dalam format JSON
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }

        $socials = Social::all();
        return view('admin.social.create', compact('socials'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string',
        ]);

        // Simpan data ke database
        Social::create([
            'name' => $request->name,
            'icon' => $request->icon, // Diperbaiki dari $request->distributor ke $request->icon
        ]);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('admin.social.create')->with('success', 'Social Media berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Temukan data sosial media berdasarkan ID
        $social = Social::findOrFail($id);
        
        // Hapus data dari database
        $social->delete();
        
        return redirect()->route('admin.social.create')->with('success', 'Social Media berhasil dihapus.');
    }

    public function edit($id)
    {
        $social = Social::findOrFail($id);
        return response()->json($social); // Mengirim data dalam format JSON untuk JavaScript
    }

    public function update(Request $request, $id)
    {
        $social = Social::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string',
        ]);

        // Perbarui data sosial media
        $social->update([
            'name' => $request->name,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.social.create')->with('success', 'Social Media berhasil diperbarui.');
    }

    public function search(Request $request)
    {
        // Ambil input pencarian
        $query = $request->input('query');

        // Lakukan pencarian pada kolom 'name' atau 'icon'
        $socials = Social::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('icon', 'LIKE', '%' . $query . '%')
            ->paginate(10); // Menggunakan pagination

        // Kembalikan hasil pencarian dalam bentuk JSON
        return response()->json($socials);
    }
}
