<?php

namespace App\Http\Controllers;

use App\Models\DirectorMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DirectorMessageController extends Controller
{
    public function index()
    {
       
        $message = DirectorMessage::first(); 
        return view('backend.pages.director-messages.index', compact('message'));
    }

   
    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'message' => 'required|string',
        ]);

        // Image Upload Logic
        if ($request->hasFile('image')) {
            
            $existing = DirectorMessage::first();
            if ($existing && $existing->image && Storage::exists('public/' . $existing->image)) {
                Storage::delete('public/' . $existing->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $validated['image'] = $image->storeAs('director_messages', $imageName, 'public');
        }

       
        DirectorMessage::updateOrCreate(
            ['id' => 1], 
            $validated
        );

        return redirect()->route('director-message.index')
            ->with('success', 'Director message saved successfully!');
    }
}
