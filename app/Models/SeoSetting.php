<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'site_title', 'meta_description', 'meta_keywords', 
        'og_image', 'google_analytics', 'google_tag_manager'
    ];

  
    public static function getGlobal()
    {
        return self::first() ?? new self();
    }
}