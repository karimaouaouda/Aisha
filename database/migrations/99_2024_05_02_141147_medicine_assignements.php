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

            $table->foreignId('treatment_id')
                ->references('id')
                ->on('treatments');

            $table->foreignId('medicine_id')
                ->references('id')
                ->on('medicines');

            $table->string('treatment_reason');

            $table->tinyInteger("quantity", unsigned: true);

            $table->tinyInteger('times_in_day', unsigned: true);

            $table->enum('times', \App\Enums\Base\MedicineTime::values());

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
