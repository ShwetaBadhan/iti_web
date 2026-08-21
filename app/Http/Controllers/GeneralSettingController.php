<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $setting = GeneralSetting::first();
        return view('backend.pages.settings.general-settings', compact('setting'));
    }

    public function storeOrUpdate(Request $request)
{
    $validated = $request->validate([
        'site_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:100',
        'website_url' => 'nullable|url|max:255',
        'address' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        'favicon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:1024',
        'backend_logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'youtube' => 'nullable|url',
        'sample_certificate' => 'nullable|mimes:pdf,jpeg,png,jpg,webp|max:7096',
        'form5_certificate' => 'nullable|mimes:pdf,jpeg,png,jpg,webp|max:7096', // <-- Added
    ]);

    // File Uploads Helper
    $fileFields = [
        'logo', 'favicon', 'backend_logo', 'cover_image', 
        'sample_certificate', 'form5_certificate' // <-- Added
    ];
    
    foreach ($fileFields as $field) {
        if ($request->hasFile($field)) {
            $existing = GeneralSetting::first();
            if ($existing && $existing->$field && Storage::exists('public/' . $existing->$field)) {
                Storage::delete('public/' . $existing->$field);
            }
            
            $file = $request->file($field);
            $fileName = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
            $validated[$field] = $file->storeAs('settings', $fileName, 'public');
        }
    }

    GeneralSetting::updateOrCreate(['id' => 1], $validated);

    return redirect()->route('general-settings')->with('success', 'General settings updated successfully!');
}
}