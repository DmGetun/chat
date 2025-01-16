<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $creator = User::first();
        $chat = Chat::first();
        return [
            'id' => fake()->uuid(),
            'text' => fake()->text(50),
            'is_pinned' => false,
            'is_visible' => true,
            'user_id' => $creator->id,
            'chat_id' => $chat->id,
        ];
    }
}
