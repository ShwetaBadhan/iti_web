<?php

namespace App\Helpers;

use App\Models\SeoSetting;
use App\Models\SeoPage;
use App\Models\Course;
use Illuminate\Support\Str;

class SeoHelper
{
    public static function generate($currentPage, $dynamicData = [])
    {
        // 1. Base Global Settings
        $global = SeoSetting::first() ?? new SeoSetting();

        // ---------------------------------------------------------
        // PRIORITY 1: Check if a Course object is explicitly passed
        // ---------------------------------------------------------
        if (isset($dynamicData['course']) && $dynamicData['course'] instanceof Course) {
            $course = $dynamicData['course'];
            
            return [
                'title'       => !empty($course->meta_title) ? $course->meta_title : ($course->name . ' | ' . $global->site_title),
                'description' => !empty($course->meta_description) ? $course->meta_description : Str::limit(strip_tags($course->description ?? 'Learn more about this course.'), 160),
                'keywords'    => !empty($course->meta_keywords) ? $course->meta_keywords : $global->meta_keywords,
                'canonical'   => url()->current(),
                'ogImage'     => !empty($course->detail_image) ? asset('storage/' . $course->detail_image) : asset('storage/' . $global->og_image),
                'noindex'     => $course->noindex ?? 0,
                'global'      => $global,
            ];
        }

        // ---------------------------------------------------------
        // PRIORITY 2: Check Static Pages by Route Name
        // ---------------------------------------------------------
        $page = SeoPage::where('page_name', $currentPage)->first();
        if ($page) {
            return [
                'title'       => !empty($page->meta_title) ? $page->meta_title : $global->site_title,
                'description' => !empty($page->meta_description) ? $page->meta_description : $global->meta_description,
                'keywords'    => !empty($page->meta_keywords) ? $page->meta_keywords : $global->meta_keywords,
                'canonical'   => url()->current(),
                'ogImage'     => asset('storage/' . $global->og_image),
                'noindex'     => $page->noindex ?? 0,
                'global'      => $global,
            ];
        }

        // ---------------------------------------------------------
        // PRIORITY 3: Global Fallback (Default)
        // ---------------------------------------------------------
        return [
            'title'       => $global->site_title,
            'description' => $global->meta_description,
            'keywords'    => $global->meta_keywords,
            'canonical'   => url()->current(),
            'ogImage'     => asset('storage/' . $global->og_image),
            'noindex'     => 0,
            'global'      => $global,
        ];
    }
}