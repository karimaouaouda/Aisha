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
        Schema::create('post_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')
                    ->references('id')
                    ->on('patients');

            $table->json('source_text')
                    ->nullable();

            $table->foreignId('start_from_message')
                ->nullable()
                ->references('id')
                ->on('messages');

            $table->foreignId('stop_at_message')
                        ->nullable()
                        ->references('id')
                        ->on('messages');

            $table->json('diseases_expected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_analyses');
    }
};
