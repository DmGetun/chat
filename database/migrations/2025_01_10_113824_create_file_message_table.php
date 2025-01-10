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
        Schema::create('file_message', function (Blueprint $table) {
            $table->id();

            $table->foreignUuid('file_id')
                ->references('id')
                ->on('files')
                ->onDelete('set null');

            $table->foreignUuid('message_id')
                ->references('id')
                ->on('messages')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_message');
    }
};
