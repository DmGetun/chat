<?php

namespace App\Livewire\Chat;

use App\Repositories\ChatRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class ChatList extends Component
{
    public Collection $chats;
    //public ?string $activeChat = null;

    public function mount()
    {
        $this->chats = ChatRepository::getAll();
    }

    #[Renderless]
    public function setActiveChat(string $chatId)
    {
        $this->dispatch('chat-changed', chatId: $chatId);
    }

    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
