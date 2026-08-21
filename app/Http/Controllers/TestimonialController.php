<?php
namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order', 'asc')->get();
        return view('backend.pages.testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $validated['image'] = $image->storeAs('testimonials', $imageName, 'public');
        }

        $validated['order'] = $request->order ?? (Testimonial::max('order') + 1);
        Testimonial::create($validated);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial added successfully!');
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            if ($testimonial->image && Storage::exists('public/' . $testimonial->image)) {
                Storage::delete('public/' . $testimonial->image);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $validated['image'] = $image->storeAs('testimonials', $imageName, 'public');
        }

        $testimonial->update($validated);
        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully!');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully!');
    }

    public function toggleStatus(Testimonial $testimonial)
    {
        $testimonial->update(['status' => !$testimonial->status]);
        return redirect()->route('testimonials.index')->with('success', 'Status updated successfully!');
    }
}