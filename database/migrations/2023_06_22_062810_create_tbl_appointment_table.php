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
        Schema::create('tbl_appointment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from');
            $table->unsignedBigInteger('to');
            $table->foreign('from')->references('id')->on('tbl_clinician');
            $table->foreign('to')->references('id')->on('tbl_student');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_appointment');
    }
};
