<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SeoSetting;
use App\Models\SeoPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeoController extends Controller
{
    public function index()
    {
        $globalSetting = SeoSetting::first() ?? new SeoSetting();
        $staticPages = SeoPage::all()->keyBy('page_name');
        $courses = Course::all();
        
        return view('backend.pages.seo.index', compact('globalSetting', 'staticPages', 'courses'));
    }

    public function updateGlobal(Request $request)
    {
        $validated = $request->validate([
            'site_title' => 'required|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'google_analytics' => 'nullable|string',
            'google_tag_manager' => 'nullable|string',
        ]);

        $setting = SeoSetting::first() ?? new SeoSetting();
        
        if ($request->hasFile('og_image')) {
            if ($setting->og_image && Storage::exists('public/' . $setting->og_image)) {
                Storage::delete('public/' . $setting->og_image);
            }
            $validated['og_image'] = $request->file('og_image')->store('seo', 'public');
        }

        $setting->fill($validated)->save();
        return back()->with('success', 'Global SEO settings updated!');
    }

    public function updatePage(Request $request, $pageName)
    {
        $validated = $request->validate([
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
            'noindex' => 'nullable|boolean',
        ]);

        $validated['noindex'] = $request->has('noindex') ? 1 : 0;
        
        SeoPage::updateOrCreate(
            ['page_name' => $pageName],
            $validated
        );
        
        return back()->with('success', 'Page SEO updated!');
    }

      public function updateCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        
        $validated = $request->validate([
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'noindex' => 'nullable|boolean',
        ]);

        // Handle checkbox: if it exists in request, it's 1 (true), else 0 (false)
        $validated['noindex'] = $request->has('noindex') ? 1 : 0;
        
        $course->update($validated);
        
        return back()->with('success', 'Course SEO updated successfully!');
    }
}