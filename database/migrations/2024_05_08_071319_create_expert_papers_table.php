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
            $table->bigIncrements('ePaperID');
            $table->string('ePaperTitle');
            $table->string('eYear');
            $table->string('ePublicationType');
            $table->unsignedBigInteger('expertID');
            $table->unsignedBigInteger('eResearchID');
            $table->foreign('expertID')->references('expertID')->on('experts')->onDelete('cascade');
            $table->foreign('eResearchID')->references('eResearchID')->on('expert_researches')->onDelete('cascade');

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
