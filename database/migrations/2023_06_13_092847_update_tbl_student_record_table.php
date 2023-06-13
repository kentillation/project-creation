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
        Schema::table('tbl_student_record', function (Blueprint $table) {
            $table->foreign('year_level_id')->references('id')->on('tbl_year_level');
            $table->foreign('section_id')->references('id')->on('tbl_section');
            $table->foreign('blood_type_id')->references('id')->on('tbl_blood_type');
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
