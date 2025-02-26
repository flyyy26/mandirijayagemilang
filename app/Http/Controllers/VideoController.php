<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::first(); 
        return response()->json($videos); // Kembalikan data dalam format JSON
    }

    public function create()
    {
        $video = Video::first(); // Ambil video pertama dari database
        return view('admin.slideshow.create', compact('video'));
    }

    function getYouTubeVideoId($url)
    {
        preg_match('/(?:youtu\.be\/|youtube\.com\/(?:.*v=|.*\/|.*embed\/|.*v\/|.*watch\?v=))([\w-]+)/', $url, $matches);
        return $matches[1] ?? null;
    }


    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|string|max:255',
        ]);
    
        // Ambil video pertama, jika ada update, jika tidak buat baru
        $video = Video::first();
        
        if ($video) {
            $video->update(['video' => $request->video]);
        } else {
            Video::create(['video' => $request->video]);
        }
    
        // Redirect ke halaman yang sama agar input tetap terisi
        return redirect()->route('admin.slideshow.create')->with('success', 'Video berhasil disimpan.');
    }
    

    public function edit($id)
    {
        $videos = Video::findOrFail($id);
        return response()->json($videos); // Mengirim data dalam format JSON untuk JavaScript
    }
    public function destroy($id)
    {
        $videos = Video::findOrFail($id);
        $videos->delete();
        return redirect()->route('admin.slideshow.create')->with('success', 'Video berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'video' => 'required|string|max:255',
        ]);
    
        $video = Video::findOrFail($id);
        $video->update([
            'video' => $request->video,
        ]);

        return redirect()->route('admin.slideshow.create')->with('success', 'Video berhasil diperbarui.');
    }
}

