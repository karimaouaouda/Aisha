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
        Schema::create("medicine_assignements", function(Blueprint $table){
            $table->id();

            $table->foreignId('medicine')
                ->references('id')
                ->on('medicines');

            $table->foreignId("doctor_id")
                ->references("id")
                ->on("doctors");

            $table->foreignId('patient_id')
                ->references("id")
                ->on("patients");

            $table->tinyInteger("quantity", unsigned: true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("medicine_assignements");
    }
};
