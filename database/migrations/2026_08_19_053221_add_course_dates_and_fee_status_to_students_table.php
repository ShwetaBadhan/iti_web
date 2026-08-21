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
    Schema::table('students', function (Blueprint $table) {
        $table->date('course_from_date')->nullable()->after('guardian_address');
        $table->date('course_to_date')->nullable()->after('course_from_date');
        $table->enum('fee_status', ['unpaid', 'partially_paid', 'paid'])->default('unpaid')->after('course_to_date');
    });
}

public function down()
{
    Schema::table('students', function (Blueprint $table) {
        $table->dropColumn(['course_from_date', 'course_to_date', 'fee_status']);
    });
}
};
