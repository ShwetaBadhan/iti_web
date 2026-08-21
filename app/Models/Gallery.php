<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::deleting(function ($gallery) {
            if ($gallery->image && Storage::exists('public/' . $gallery->image)) {
                Storage::delete('public/' . $gallery->image);
            }
        });
    }
}