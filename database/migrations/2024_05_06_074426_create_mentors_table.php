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
        Schema::create('mentors', function (Blueprint $table) {
            $table->string('Mentor_ID')->primary();
            $table->string('MFullName');
            $table->string('MICNo');
            $table->string('MGender');
            $table->string('MNoPhone');
            $table->string('MAddress');
            $table->string('MEmail');
            $table->string('UserID')->references('UserID')->on('userprofiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};
