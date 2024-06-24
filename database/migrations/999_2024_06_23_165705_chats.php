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
        Schema::create('chats', function(Blueprint $table){
            $table->foreignId('conversation_id')
                ->references('id')
                ->on('conversations');

            $table->string('source_conversationable_type');

            $table->bigInteger('source_conversationable_id');

            $table->string('target_conversationable_type');

            $table->bigInteger('target_conversationable_id');

            $table->enum('type', \App\Enums\ChatTypes::values());

            $table->text('content')->nullable();

            $table->string('image')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
