<?php

use App\Enums\IOTTopics;
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
        Schema::create('iot_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')
                ->references('id')
                ->on('patients');

            $table->enum(
                'topic',
                IOTTopics::values());

            $table->json('data');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iot_data');
    }
};
