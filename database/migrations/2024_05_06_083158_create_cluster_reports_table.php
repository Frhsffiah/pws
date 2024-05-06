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
        Schema::create('cluster_reports', function (Blueprint $table) {
            $table->string('ReportID')->primary();
            $table->string('PName');
            $table->string('Staff_ID')->references('Staff_ID')->on('staff');
            $table->string('Platinum_ID')->references('Platinum_ID')->on('platinums');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cluster_reports');
    }
};
