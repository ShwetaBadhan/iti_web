<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Course;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\GeneralSetting;
use App\Models\ChairmanMessage;
use App\Models\DirectorMessage;

class HomeController extends Controller
{
    // Helper method to get global settings for Header/Footer
    private function getGlobalData()
    {
        return [
            'settings' => GeneralSetting::first(),
        ];
    }

    public function index()
   {
       $data = [
           'sliders' => Slider::where('status', true)->orderBy('order')->get(),
           'courses' => Course::where('status', true)->latest()->get(),
           'blogs' => Blog::where('status', true)->latest()->take(3)->get(), // ✅ Latest 3 blogs
           'testimonials' => Testimonial::where('status', true)->orderBy('order')->get(),
           'faqs' => Faq::where('status', true)->orderBy('order')->get(), 
           'settings' => GeneralSetting::first(),
       ];
       return view('pages.index', $data);
   }

    public function about()
    {
        $data = array_merge($this->getGlobalData(), [
            'chairman' => ChairmanMessage::first(),
            'director' => DirectorMessage::first(),
        ]);
        return view('pages.about-us', $data);
    }

    public function chairman()
    {
        $data = array_merge($this->getGlobalData(), [
            'message' => ChairmanMessage::first(),
        ]);
        return view('pages.chairman', $data);
    }

    public function director()
    {
        $data = array_merge($this->getGlobalData(), [
            'message' => DirectorMessage::first(),
        ]);
        return view('pages.director', $data);
    }

    public function team()
    {
        return view('pages.our-team', $this->getGlobalData());
    }

    public function courses()
    {
        $data = array_merge($this->getGlobalData(), [
            'courses' => Course::where('status', true)->latest()->get(),
        ]);
        return view('pages.our-courses', $data);
    }

    // ✅ Dynamic Course Details (Replaces all hardcoded -details routes)
    public function courseDetails($slug)
    {
        $course = Course::where('slug', $slug)->where('status', true)->firstOrFail();
        $data = array_merge($this->getGlobalData(), [
            'course' => $course,
        ]);
        return view('pages.courses.course-details', $data);
    }

    public function gallery()
    {
        $data = array_merge($this->getGlobalData(), [
            'images' => Gallery::where('status', true)->latest()->get(),
        ]);
        return view('pages.our-gallery', $data);
    }

    public function contact()
    {
        return view('pages.contact-us', $this->getGlobalData());
    }

    public function results()
    {
        return view('pages.our-results', $this->getGlobalData());
    }

    public function mission()
    {
        return view('pages.our-mission', $this->getGlobalData());
    }

    public function terms()
    {
        return view('pages.terms-conditions', $this->getGlobalData());
    }

    public function privacy()
    {
        return view('pages.privacy-policy', $this->getGlobalData());
    }

    public function blogs()
    {
        $data = array_merge($this->getGlobalData(), [
            'blogs' => Blog::where('status', true)->latest()->get(),
        ]);
        return view('pages.our-blogs', $data);
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', true)->firstOrFail();
        $data = array_merge($this->getGlobalData(), [
            'blog' => $blog,
        ]);
        return view('pages.blog-details', $data);
    }
}