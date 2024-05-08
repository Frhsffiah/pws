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
        Schema::create('publication__reports', function (Blueprint $table) {
            $table->string('PubReportID')->primary();
            $table->string('PubReport_type');
            $table->string('PubReport_university');
            $table->date('PubReport_date');
            $table->string('PubID')->references('PubID')->on('publications');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publication__reports');
    }
};
