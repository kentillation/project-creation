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
            $table->string('student_id');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('street_address')->nullable();
            $table->string('barangay')->nullable();
            $table->string('muni_city')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('age')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('bmi')->nullable();
            $table->string('gender')->nullable();
            $table->string('year_level')->nullable();
            $table->string('section')->nullable();
            $table->string('blood_type')->nullable();
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
