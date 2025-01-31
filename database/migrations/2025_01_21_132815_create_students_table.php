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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_code')->unique();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->date('dob');
            $table->string('sex');
            $table->string('address');
            $table->string('mobile_number');
            $table->string('level');
            $table->string('section');
            $table->string('father_lastname')->nullable();
            $table->string('father_firstname')->nullable();
            $table->string('father_middlename')->nullable();
            $table->string('father_mobile_number')->nullable();
            $table->string('mother_lastname')->nullable();
            $table->string('mother_firstname')->nullable();
            $table->string('mother_middlename')->nullable();
            $table->string('mother_mobile_number')->nullable();
            $table->string('first_vaccine_name')->nullable();
            $table->string('second_vaccine_name')->nullable();
            $table->date('first_vaccine_date')->nullable();
            $table->date('second_vaccine_date')->nullable();
            $table->string('booster_name')->nullable();
            $table->date('booster_date')->nullable();
            $table->date('had_covid')->nullable();
            $table->text('allergies')->nullable();
            $table->string('medication_name')->nullable();
            $table->string('used_to_treat')->nullable();
            $table->string('dose_time')->nullable();
            $table->text('ongoing_treatment')->nullable();
            $table->text('condition_not_allow_pe')->nullable();
            $table->string('visual_dificulties')->nullable();
            $table->text('hearing_speech_difficulties')->nullable();
            $table->text('medical_conditions')->nullable();
            $table->text('other_medical_conditions')->nullable();
            $table->boolean('is_archived')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
