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
            $table->string('cbc_file')->nullable();
            $table->string('urinalysis_file')->nullable();
            $table->string('fecalysis_file')->nullable();
            $table->string('x_ray_file')->nullable();
            $table->string('hba_file')->nullable();
            $table->string('hbv_file')->nullable();
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
