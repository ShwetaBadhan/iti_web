<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('roll_number')->unique(); // Auto-generated
        $table->string('name');
        $table->string('course');
        $table->string('academic_year')->nullable();
        $table->enum('gender', ['Male', 'Female'])->nullable();
        $table->date('dob')->nullable();
        $table->string('phone')->nullable();
        $table->string('photo')->nullable();
        $table->string('father_name')->nullable();
        $table->text('guardian_address')->nullable();
        $table->boolean('status')->default(true);
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('students');
}
};
