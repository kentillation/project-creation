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
        Schema::create('tbl_lab_test_category', function (Blueprint $table) {
            $table->id();
            $table->string('lab_test');
            $table->timestamps();
        });

        Schema::table('tbl_appointment', function (Blueprint $table) {
            $table->unsignedBigInteger('lab_test');
            $table->foreign('lab_test')->references('id')->on('tbl_lab_test_category');
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
