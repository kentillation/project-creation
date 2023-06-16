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
        Schema::create('tbl_student_record', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('age')->nullable();
            $table->string('phone')->nullable();
            $table->string('street_address')->nullable();
            $table->string('barangay')->nullable();
            $table->string('muni_city')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('bmi')->nullable();
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('year_level_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('blood_type_id');
            $table->unsignedBigInteger('status_record_id');
            $table->foreign('student_id')->references('id')->on('tbl_student');
            $table->foreign('gender_id')->references('id')->on('tbl_gender');
            $table->foreign('year_level_id')->references('id')->on('tbl_year_level');
            $table->foreign('section_id')->references('id')->on('tbl_section');
            $table->foreign('blood_type_id')->references('id')->on('tbl_blood_type');
            $table->foreign('status_record_id')->references('id')->on('tbl_status_record');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_student_record');
    }
};
