<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    /**
     * The attributes that are mass assignable.
     * This ensures robust handling and prevents errors from incomplete entries.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'course',
        'message',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}