<?php

namespace App\Repositories;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Collection;

final class ChatRepository
{
    public static function getById($id): Chat
    {
        return Chat::findOrFail($id);
    }

    public static function getAll(): Collection
    {
        return Chat::all();
    }
}
