<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('backend.pages.gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . Str::random(10) . '.' . $request->image->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('gallery', $imageName, 'public');
        }

        Gallery::create($validated);
        return redirect()->route('gallery.index')->with('success', 'Image uploaded successfully!');
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image && Storage::exists('public/' . $gallery->image)) {
                Storage::delete('public/' . $gallery->image);
            }
            $imageName = time() . '_' . Str::random(10) . '.' . $request->image->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('gallery', $imageName, 'public');
        }

        $gallery->update($validated);
        return redirect()->route('gallery.index')->with('success', 'Image updated successfully!');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully!');
    }

    public function toggleStatus(Gallery $gallery)
    {
        $gallery->update(['status' => !$gallery->status]);
        return redirect()->route('gallery.index')->with('success', 'Status updated!');
    }
}