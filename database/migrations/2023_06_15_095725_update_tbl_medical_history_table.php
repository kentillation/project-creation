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
        Schema::table('tbl_medical_history', function (Blueprint $table) {
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('year_level_id');
            $table->foreign('gender_id')->references('id')->on('tbl_gender');
            $table->foreign('year_level_id')->references('id')->on('tbl_year_level');
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
