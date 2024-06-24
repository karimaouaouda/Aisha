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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')
                    ->references('id')
                    ->on('doctors');

            $table->string('title');

            $table->string('sub_title');

            $table->mediumText('summarize');

            $table->longText('body');

            $table->string('cover');

            $table->boolean('paid');

            $table->float('price')->nullable();

            $table->json('references')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
