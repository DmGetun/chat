<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CreateMessage;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class CreateMessageTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(CreateMessage::class)
            ->assertStatus(200);
    }

    /** @test */
    public function can_create_message()
    {
        Storage::fake('files');

        $file = UploadedFile::fake()->image('file.png');
        $chat_id = Chat::first()->id;

        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(\App\Livewire\Chat\CreateMessage::class)
            ->set('file', $file)
            ->set('chat_id', $chat_id)
            ->call('upload', 'uploaded-file.png');

        Storage::disk('files')->assertExists('uploaded-file.png');
    }
}
