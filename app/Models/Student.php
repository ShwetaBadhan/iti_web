<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory;

protected $fillable = [
    'roll_number', 'name', 'course', 'academic_year', 'gender', 'dob', 
    'phone', 'photo', 'father_name', 'guardian_address', 'status',
    'course_from_date', 'course_to_date', 'fee_status', 
    'state', 'district',
];

protected $casts = [
    'status' => 'boolean',
    'dob' => 'date',
    'course_from_date' => 'date', // Cast as date
    'course_to_date' => 'date',   // Cast as date
];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($student) {
            if ($student->photo && Storage::exists('public/' . $student->photo)) {
                Storage::delete('public/' . $student->photo);
            }
        });
    }
}