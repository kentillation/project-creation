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
        Schema::table('tbl_appointment', function (Blueprint $table) {
            // $table->unsignedBigInteger('status_appointment');
            // $table->foreign('status_appointment')->references('id')->on('tbl_appointment_status');
            $table->foreignId('status_appointment')->constraint('tbl_appointment_status')->onDelete('cascade');
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
