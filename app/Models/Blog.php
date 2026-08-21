<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'author', 'category', 'image', 'short_description', 
        'content', 'tags', 'status', 'published_at'
    ];

    protected $casts = [
        'status' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug
        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title);
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title')) {
                $blog->slug = Str::slug($blog->title);
            }
        });

        // Delete image when blog is deleted
        static::deleting(function ($blog) {
            if ($blog->image && Storage::exists('public/' . $blog->image)) {
                Storage::delete('public/' . $blog->image);
            }
        });
    }
}