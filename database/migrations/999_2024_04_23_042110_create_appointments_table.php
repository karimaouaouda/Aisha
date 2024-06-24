<?php

use App\Enums\AppointmentStatus;
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
                ->on("patients");

            $table->foreignId("doctor_id")
                ->references("id")
                ->on("doctors");

            $table->timestamp("time")->nullable();

            $table->tinyText('reason');

            $table->enum('status', AppointmentStatus::values())
                        ->default(AppointmentStatus::WAITING->value);

            $table->string('reject_reason')->nullable();

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
