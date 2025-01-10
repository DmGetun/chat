<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChatController extends Controller
{
    public function index(): View
    {
        return view('chat');
    }
    public function show(string $id): View
    {
        $messages = Chat::find(1)->messages;
        return $messages;
    }
}
