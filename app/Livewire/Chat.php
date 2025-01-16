<?php

namespace App\Livewire;

use App\Repositories\ChatRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Chat extends Component
{
    public array $chats = [];

    public function mount()
    {
        $this->chats = ChatRepository::getAll()->toArray();
    }

    public function render()
    {
        return view('livewire.chat.chat');
    }
}
