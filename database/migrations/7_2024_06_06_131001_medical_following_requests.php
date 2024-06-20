<?php

use App\Enums\RequestStatus;
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
        Schema::create('medical_following_requests', function(Blueprint $table){

            $table->id();

            $table->foreignId('patient_id')
                    ->references('id')
                    ->on('patients');

            $table->foreignId('doctor_id')
                    ->references('id')
                    ->on('doctors');

            $table->string('request_note')->nullable();

            $table->text('reject_reason')->nullable();

            $table->enum('status', RequestStatus::values());

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_following_requests');
    }
};
