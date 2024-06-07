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
        Schema::create('staff', function (Blueprint $table) {
            $table->string('Staff_ID')->primary();
            $table->string('SFullName');
            $table->string('SICNo');
            $table->string('SGender');
            $table->string('SNoPhone');
            $table->string('SAddress');
            $table->string('SEmail');
            $table->string('UserID')->references('UserID')->on('userprofiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
