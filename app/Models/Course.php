<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'home_image', 'detail_image', 'short_description',
        'course_detail', 'course_overview', 'downloads', 'career_opportunities', 'status',
          'meta_title',
        'meta_description',
        'meta_keywords',
        'noindex',
    ];

    protected $casts = [
        'downloads' => 'array',
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($course) {
            $course->slug = Str::slug($course->name);
        });

        static::deleting(function ($course) {
            if ($course->home_image && Storage::exists('public/' . $course->home_image)) {
                Storage::delete('public/' . $course->home_image);
            }
            if ($course->detail_image && Storage::exists('public/' . $course->detail_image)) {
                Storage::delete('public/' . $course->detail_image);
            }
        });
    }
}