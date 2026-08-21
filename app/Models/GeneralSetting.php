<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GeneralSetting extends Model
{
    use HasFactory;

 protected $fillable = [
    'site_name', 'email', 'phone', 'website_url', 'address',
    'logo', 'favicon', 'backend_logo', 'cover_image',
    'facebook', 'twitter', 'instagram', 'linkedin', 'youtube',
    'sample_certificate', 'form5_certificate' // <-- Added form5_certificate
];

protected static function boot()
{
    parent::boot();
    static::deleting(function ($setting) {
        // Added 'form5_certificate' to the cleanup array
        $fields = ['logo', 'favicon', 'backend_logo', 'cover_image', 'sample_certificate', 'form5_certificate'];
        foreach ($fields as $field) {
            if ($setting->$field && Storage::exists('public/' . $setting->$field)) {
                Storage::delete('public/' . $setting->$field);
            }
        }
    });
}
}