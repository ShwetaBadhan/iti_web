<?php

namespace App\Http\Controllers;

use App\Models\ChairmanMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChairmanMessageController extends Controller
{

    public function index()
    {
       
        $message = ChairmanMessage::first(); 
        return view('backend.pages.chairman-messages.index', compact('message'));
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
            
            $existing = ChairmanMessage::first();
            if ($existing && $existing->image && Storage::exists('public/' . $existing->image)) {
                Storage::delete('public/' . $existing->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $validated['image'] = $image->storeAs('chairman_messages', $imageName, 'public');
        }

       
        ChairmanMessage::updateOrCreate(
            ['id' => 1], 
            $validated
        );

        return redirect()->route('chairman-message.index')
            ->with('success', 'Chairman message saved successfully!');
    }
}