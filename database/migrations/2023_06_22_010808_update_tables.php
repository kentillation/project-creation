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
        Schema::table('tbl_clinician', function (Blueprint $table) {
            $table->string('admin_email')->nullable();
        });

        Schema::table('tbl_staff', function (Blueprint $table) {
            $table->string('admin_email')->nullable();
        });

        Schema::table('tbl_admin', function (Blueprint $table) {
            $table->string('admin_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
