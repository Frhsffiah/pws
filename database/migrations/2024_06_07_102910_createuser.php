<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key auto-incrementing ID
            $table->string('email')->unique(); // Unique email field
            $table->string('role'); // Role field
            $table->string('password'); // Password field
            $table->unsignedBigInteger('RegID')->nullable();
            $table->foreign('RegID')->references('RegID')->on('registrations')->onDelete('cascade');
            $table->timestamps(); // Created at and updated at timestamps
        });
        
        Schema::table('users', function (Blueprint $table) {
           
        });
    }

    public function down(): void
    {

        Schema::dropIfExists('users'); // Drop the users table if it exists
    }
};

