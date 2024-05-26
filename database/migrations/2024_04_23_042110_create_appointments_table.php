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
        Schema::dropIfExists('appointments');
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("patient_id")
                ->references("id")
                ->on("users");

            $table->foreignId("doctor_id")
                ->references("id")
                ->on("users");
            $table->timestamp("time");

            $table->enum("requester", ["doctor", "patient"]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
