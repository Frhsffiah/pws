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
        Schema::create('platinums', function (Blueprint $table) {
            $table->string('Platinum_ID')->primary();
            $table->string('PName');
            $table->string('PNoPhone');
            $table->string('PAddress');
            $table->string('PGender');
            $table->string('UserID')->references('UserID')->on('userprofiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platinums');
    }
};
