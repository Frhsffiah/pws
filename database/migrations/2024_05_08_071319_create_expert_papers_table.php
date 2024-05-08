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
        Schema::create('expert_papers', function (Blueprint $table) {
            $table->string('ePaperID')->primary();
            $table->string('ePaperTitle');
            $table->string('eYear');
            $table->string('ePublicationType');
            $table->string('expertID')->references('expertID')->on('experts');
            $table->string('eResearchID')->references('eResearchID')->on('expert_researches');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert_papers');
    }
};
