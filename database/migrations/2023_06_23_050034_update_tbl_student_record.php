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
            $table->unsignedBigInteger('status_appointment_id');
            $table->foreign('status_appointment_id')->references('id')->on('tbl_appointment');
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
