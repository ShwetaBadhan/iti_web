<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class FeeReceipt extends Model
{
    protected $fillable = [
        'receipt_no', 'student_id', 'total_fees', 'paid_amount', 
        'pending_amount', 'payment_mode', 'payment_date', 'remarks'
    ];

    protected $casts = [
        'payment_date' => 'date',
        'total_fees' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'pending_amount' => 'decimal:2',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}