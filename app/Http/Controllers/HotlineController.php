<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotline;

class HotlineController extends Controller
{
    public function index()
    {
        $hotlines = Hotline::all(); // Ambil semua kategori dari database
        return response()->json($hotlines); // Kembalikan data dalam format JSON
    }

    public function create()
    {
        $hotlines = Hotline::all();

        return view('admin.whatsapp.create', compact('hotlines')); // Menampilkan form input kategori
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Simpan kategori ke database
        Hotline::create([
            'name' => $request->name,
        ]);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('admin.whatsapp.create')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $hotline = Hotline::findOrFail($id);
        return response()->json($hotline); // Mengirim data dalam format JSON untuk JavaScript
    }
    public function destroy($id)
    {
        $hotline = Hotline::findOrFail($id);
        $hotline->delete();
        return redirect()->route('admin.whatsapp.create')->with('success', 'Nomor Hotline berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $hotline = Hotline::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $hotline->name = $request->name;
        $hotline->save();

        return redirect()->route('admin.whatsapp.create')->with('success', 'Nomor Hotline berhasil diperbarui.');
    }
}

