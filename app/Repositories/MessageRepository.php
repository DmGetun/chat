<?php

namespace App\Repositories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;

class MessageRepository
{
    public static function getById($id): Message
    {
        return Message::findOrFail($id);
    }

    public static function getAll(): Collection
    {
        return Message::all();
    }

    public static function getByChatId(string $chatId): Collection
    {
        return Message::where('chat_id', '=', $chatId)->get();
    }
}
