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
        Schema::create('tbl_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_name');
            $table->unsignedBigInteger('clinician_name');
            $table->unsignedBigInteger('staff_name');
            $table->unsignedBigInteger('admin_name');
            $table->foreign('student_name')->references('id')->on('tbl_student');
            $table->foreign('clinician_name')->references('id')->on('tbl_clinician');
            $table->foreign('staff_name')->references('id')->on('tbl_staff');
            $table->foreign('admin_name')->references('id')->on('tbl_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_activity_logs');
    }
};
