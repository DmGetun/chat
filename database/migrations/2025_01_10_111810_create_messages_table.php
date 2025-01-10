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
        Schema::create('messages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unique('id');

            $table->text('text');
            $table->boolean('is_pinned');
            $table->boolean('is_visible');
            $table->timestamps();
            $table->softDeletes();

            $table->foreignUuid('reply_id')
                ->nullable()
                ->references('id')
                ->on('messages');

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreignUuid('chat_id')
                ->references('id')
                ->on('chats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
