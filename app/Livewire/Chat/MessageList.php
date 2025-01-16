<?php

namespace App\Livewire\Chat;

use App\Events\MessageCreated;
use App\Models\Chat;
use App\Models\Message;
use App\Repositories\ChatRepository;
use App\Repositories\MessageRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class MessageList extends Component
{
    public Chat $chat;

    public ?Collection $messages;

    public function mount()
    {
        $this->messages = new Collection;
    }

    #[On('chat-changed')]
    public function changeActiveChat($chatId)
    {
        $this->chat = ChatRepository::getById($chatId);
        $this->messages = MessageRepository::getByChatId($chatId);
    }

    #[On('message-created')]
    public function addNewMessage(string $messageId)
    {
        $message = MessageRepository::getById($messageId);
        if ($message) {
            $this->messages = $this->messages->push($message);
        }
    }

    public function render()
    {
        return view('livewire.chat.message-list');
    }
}
