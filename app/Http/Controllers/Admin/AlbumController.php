<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;

class AlbumController extends Controller
{
    use ImageProcessing;

    public function index()
    {
        $albums = Album::orderBy('created_at', 'desc')->get();
        return view('admin.albums.index', compact('albums'));
    }

    public function create()
    {
        return view('admin.albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $imageUrl = $this->uploadAndProcessImage($request->file('image'), 'class-media/albums');

        Album::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $imageUrl,
        ]);

        return redirect()->route('admin.albums.index')->with('success', 'Album berhasil ditambahkan!');
    }

    public function edit(Album $album)
    {
        return view('admin.albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $data['image_url'] = $this->uploadAndProcessImage($request->file('image'), 'class-media/albums');
        }

        $album->update($data);

        return redirect()->route('admin.albums.index')->with('success', 'Data album berhasil diperbarui!');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('admin.albums.index')->with('success', 'Album berhasil dihapus!');
    }
}
