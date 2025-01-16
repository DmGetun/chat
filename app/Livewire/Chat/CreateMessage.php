<?php

namespace App\Livewire\Chat;

use App\Services\MessageService;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMessage extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public string $text = '';

    public $file = [];

    public string $chat_id;

    #[On('chat-changed')]
    public function changeActiveChat($chatId)
    {
        $this->chat_id = $chatId;
    }

    public function render()
    {
        return view('livewire.chat.create-message');
    }

    public function upload($name)
    {
        $this->file->storeAs('/', $name, $disk = 'files');
    }

    public function save(MessageService $messageService)
    {
        $this->validate();
        //$path = $this->file->store('public');

        $data = $this->only(['text', 'chat_id']);
        $data['user_id'] = auth()->user()->id;
        $message = $messageService->create($data);
        $this->reset(['text']);
        $this->dispatch('message-created', messageId: $message->id);
    }
}
