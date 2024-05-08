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
        Schema::create('experts', function (Blueprint $table) {
            $table->string('expertID')->primary();
            $table->string('eName');
            $table->string('eInstitution');
            $table->string('eEmail');
            $table->string('ePhone');
            $table->string('Platinum_ID')->references('Platinum_ID')->on('platinums');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experts');
    }
};
