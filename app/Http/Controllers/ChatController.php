<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\View\View;

class ChatController extends Controller
{
    public function index(): View
    {
        return view('chat');
    }
    public function show(string $id): View
    {
        $chat = Chat::query()->findOrFail(1);
        $chat->name;
        return view('index');
    }
}
