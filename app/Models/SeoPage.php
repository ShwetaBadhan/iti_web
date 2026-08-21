<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    protected $fillable = [
        'page_name', 'route_name', 'meta_title', 'meta_description', 
        'meta_keywords', 'noindex'
    ];
}