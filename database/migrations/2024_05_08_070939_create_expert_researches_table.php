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
        Schema::create('expert_researches', function (Blueprint $table) {
            $table->string('eResearchID')->primary();
            $table->string('eResearchTitle');
            $table->string('eDomain');
            $table->string('expertID')->references('expertID')->on('experts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert_researches');
    }
};
