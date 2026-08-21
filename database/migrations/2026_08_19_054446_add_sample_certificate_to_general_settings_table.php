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
    Schema::table('general_settings', function (Blueprint $table) {
        // PDF ya Image store karne ke liye string column
        $table->string('sample_certificate')->nullable()->after('cover_image');
    });
}

public function down()
{
    Schema::table('general_settings', function (Blueprint $table) {
        $table->dropColumn('sample_certificate');
    });
}
};
