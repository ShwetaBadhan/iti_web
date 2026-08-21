<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'roll_number', 'course', 'marksheet', 
        'certificate_regular', 'certificate_form5', 'status' // ✅ Updated
    ];

    protected $casts = ['status' => 'boolean'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($result) {
            if ($result->marksheet && Storage::exists('public/' . $result->marksheet)) {
                Storage::delete('public/' . $result->marksheet);
            }
            if ($result->certificate_regular && Storage::exists('public/' . $result->certificate_regular)) {
                Storage::delete('public/' . $result->certificate_regular);
            }
            if ($result->certificate_form5 && Storage::exists('public/' . $result->certificate_form5)) {
                Storage::delete('public/' . $result->certificate_form5);
            }
        });
    }
}