<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use App\Models\Chat\Chat;
use App\Models\Chat\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getMessages(Request $request)
    {
        $chat = new Chat();
        $message = new Message();
    }

    public function sendMessage(Request $request)
    {

    }

    public function deleteMessage(Request $request)
    {

    }
}
