<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('backend.pages.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.pages.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'short_description' => 'nullable|string|max:500',
            'content' => 'required|string',
            'tags' => 'nullable|string',
            'status' => 'required|boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . Str::random(10) . '.' . $request->image->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('blogs', $imageName, 'public');
        }

        Blog::create($validated);
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('backend.pages.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'short_description' => 'nullable|string|max:500',
            'content' => 'required|string',
            'tags' => 'nullable|string',
            'status' => 'required|boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image && Storage::exists('public/' . $blog->image)) {
                Storage::delete('public/' . $blog->image);
            }
            $imageName = time() . '_' . Str::random(10) . '.' . $request->image->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('blogs', $imageName, 'public');
        }

        $blog->update($validated);
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }

    public function toggleStatus(Blog $blog)
    {
        $blog->update(['status' => !$blog->status]);
        return redirect()->route('blogs.index')->with('success', 'Status updated!');
    }
}