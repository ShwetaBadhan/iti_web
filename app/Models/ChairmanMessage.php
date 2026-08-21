<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ChairmanMessage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'designation', 'image', 'message', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($message) {
            if ($message->image && Storage::exists('public/' . $message->image)) {
                Storage::delete('public/' . $message->image);
            }
        });
    }
}