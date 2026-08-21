<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'designation', 'message', 'image', 'rating', 'order', 'status'];

    protected $casts = [
        'status' => 'boolean',
        'rating' => 'integer',
        'order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($testimonial) {
            if ($testimonial->image && Storage::exists('public/' . $testimonial->image)) {
                Storage::delete('public/' . $testimonial->image);
            }
        });
    }
}