<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order', 'asc')->get();
        return view('backend.pages.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_url' => 'nullable|url',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $validated['image'] = $image->storeAs('sliders', $imageName, 'public');
        }

        // Agar order nahi diya, toh last order + 1
        $validated['order'] = $request->order ?? (Slider::max('order') + 1);

        Slider::create($validated);

        return redirect()->route('sliders.index')->with('success', 'Slider added successfully!');
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_url' => 'nullable|url',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            // Purani image delete karo
            if ($slider->image && Storage::exists('public/' . $slider->image)) {
                Storage::delete('public/' . $slider->image);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $validated['image'] = $image->storeAs('sliders', $imageName, 'public');
        }

        $slider->update($validated);

        return redirect()->route('sliders.index')->with('success', 'Slider updated successfully!');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image && Storage::exists('public/' . $slider->image)) {
            Storage::delete('public/' . $slider->image);
        }
        $slider->delete();

        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully!');
    }

    // Status toggle karne ke liye (AJAX ya Form)
    public function toggleStatus(Slider $slider)
    {
        $slider->update(['status' => !$slider->status]);
        return redirect()->route('sliders.index')->with('success', 'Status updated successfully!');
    }
}