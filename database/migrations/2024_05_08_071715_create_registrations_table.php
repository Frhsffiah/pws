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
        Schema::create('registrations', function (Blueprint $table) {
            
            $table->string('RegID')->primary();
            $table->string('R_Type');
            $table->string('R_Title');
            $table->string('R_FullName');
            $table->string('R_IC')->unique();
            $table->string('R_Gender');
            $table->string('R_Religion');
            $table->string('R_Race');
            $table->string('R_Citizenship');
            $table->string('R_Address');
            $table->string('R_PhoneNum');
            $table->string('R_Email')->unique();
            $table->string('R_FbName');
            $table->string('R_CurrentEduLvl');
            $table->string('R_EduField');
            $table->string('R_EduInstitute');
            $table->string('R_Occupation');
            $table->string('R_Sponsorship');
            $table->string('R_Program');
            $table->string('R_Batch');
            $table->string('password');
            
            $table->string('Staff_ID')->default('S1212')->change();  //->references('Staff_ID')->on('staff');
            $table->string('Platinum_ID')->default('P1212')->change();  //->references('Platinum_ID')->on('platinums');
            $table->timestamps(); //to able create_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
