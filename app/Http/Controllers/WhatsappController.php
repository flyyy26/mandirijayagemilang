<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whatsapp;
use App\Models\Hotline;

class WhatsappController extends Controller
{
    public function index()
    {
       
        $whatsapps = Whatsapp::all(); // Ambil semua kategori dari database
        return response()->json($whatsapps); // Kembalikan data dalam format JSON
    }
    
    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login'); // Redirect if not authenticated
        }

        $hotlines = Hotline::all();
        $whatsapps = Whatsapp::all();
        return view('admin.whatsapp.create', compact('whatsapps', 'hotlines')); // Menampilkan form input nomor
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'distributor' => 'nullable|string',
        ]);

        // Simpan data ke database
        Whatsapp::create([
            'name' => $request->name,
            'distributor' => $request->distributor,
        ]);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('admin.whatsapp.create')->with('success', 'Nomor Whatsapp berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Find the WhatsApp entry by ID
        $whatsapp = Whatsapp::findOrFail($id);
        
        // Delete the WhatsApp entry
        $whatsapp->delete();
        
        return redirect()->route('admin.whatsapp.create')->with('success', 'Nomor Whatsapp berhasil dihapus.');
    }



    public function edit($id)
    {
        $whatsapp = Whatsapp::findOrFail($id);
        return response()->json($whatsapp); // Mengirim data dalam format JSON untuk JavaScript
    }

    public function update(Request $request, $id)
    {
        $whatsapp = Whatsapp::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'distributor' => 'nullable|string',
        ]);

        $whatsapp->distributor = $request->distributor;
        $whatsapp->name = $request->name;
        $whatsapp->save();

        return redirect()->route('admin.whatsapp.create')->with('success', 'Nomor Whatsapp berhasil diperbarui.');
    }

    public function search(Request $request)
    {
        // Ambil input pencarian
        $query = $request->input('query');

        // Lakukan pencarian pada kolom 'distributor' atau 'name'
        $whatsapps = Whatsapp::where('distributor', 'LIKE', '%' . $query . '%')
            ->orWhere('name', 'LIKE', '%' . $query . '%')
            ->paginate(10); // Menggunakan pagination

        // Kembalikan hasil pencarian dalam bentuk JSON
        return response()->json($whatsapps);
    }

}
