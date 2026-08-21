<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('results', function (Blueprint $table) {
            // Hum 'certificate' ko 'certificate_regular' rename kar rahe hain clarity ke liye
            $table->renameColumn('certificate', 'certificate_regular');
            // Naya Form 5 certificate column add kar rahe hain
            $table->string('certificate_form5')->nullable()->after('certificate_regular');
        });
    }

    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->renameColumn('certificate_regular', 'certificate');
            $table->dropColumn('certificate_form5');
        });
    }
};