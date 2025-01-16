<?php

namespace App\Services;

use App\Events\MessageCreated;
use App\Models\Message;

class MessageService
{
    public function create(array $data): Message
    {
        // Создание сообщения
        $message = Message::create($data);

        // Генерация события
        MessageCreated::dispatch($message);

        return $message;
    }
}
