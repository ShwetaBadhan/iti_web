<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('fee_receipts', function (Blueprint $table) {
        $table->id();
        $table->string('receipt_no')->unique(); // e.g., REC-20261024-001
        $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
        $table->decimal('total_fees', 10, 2);
        $table->decimal('paid_amount', 10, 2);
        $table->decimal('pending_amount', 10, 2);
        $table->string('payment_mode')->default('Cash'); // Cash, UPI, Bank Transfer
        $table->date('payment_date');
        $table->text('remarks')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_receipts');
    }
};
