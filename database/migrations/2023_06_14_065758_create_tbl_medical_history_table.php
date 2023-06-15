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
        Schema::create('tbl_medical_history', function (Blueprint $table) {
            $table->id();
            $table->string('condition_option')->nullable();
            $table->string('other_condition_option')->nullable();
            $table->string('symptoms_option')->nullable();
            $table->string('other_symptoms_option')->nullable();
            $table->string('medication')->nullable();
            $table->string('allergies')->nullable();
            $table->string('using_tobacco')->nullable();
            $table->string('using_illegal_drug')->nullable();
            $table->string('consume_alcohol')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_medical_history');
    }
};
