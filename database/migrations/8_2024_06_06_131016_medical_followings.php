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
        Schema::create('medical_followings', function(Blueprint $table){

            $table->foreignId('patient_id')
                    ->references('id')
                    ->on('patients');


            $table->foreignId('doctor_id')
                    ->references('id')
                    ->on('doctors');


            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_followings');
    }
};
