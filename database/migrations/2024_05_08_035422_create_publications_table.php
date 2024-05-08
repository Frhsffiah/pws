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
        Schema::create('publications', function (Blueprint $table) {
            $table->string('PubID')->primary();
            $table->string('Pub_Title');
            $table->string('Pub_author');
            $table->date('Pub_date');
            $table->string('Pub_type');
            $table->integer('Pub_DOI');
            $table->string('Platinum_ID')->references('Platinum_ID')->on('platinums');
            $table->string('Mentor_ID')->references('Mentor_ID')->on('mentors');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
