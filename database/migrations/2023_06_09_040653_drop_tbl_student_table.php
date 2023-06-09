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
        // Schema::table('tbl_student', function (Blueprint $table) {
        //     $table->dropColumn(['name', 'street_address', 'barangay', 'muni_city', 'date_of_birth', 'age','civil_status', 'citizenship', 'height', 'weight', 'bmi', 'gender', 'year_level', 'section', 'blood_type']);
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
