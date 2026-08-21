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
        $table->string('state')->nullable()->after('guardian_address');
        $table->string('district')->nullable()->after('state');
    });
}

public function down()
{
    Schema::table('students', function (Blueprint $table) {
        $table->dropColumn(['state', 'district']);
    });
}
};
