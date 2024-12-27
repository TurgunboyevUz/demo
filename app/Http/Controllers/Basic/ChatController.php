<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use App\Models\Chat\Chat;
use App\Models\Chat\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'chat_id' => 'required|exists:chats,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $chat = Chat::findOrFail($validated['chat_id']);

        if (!in_array($validated['user_id'], [$chat->user_one_id, $chat->user_two_id])) {
            return response()->json(['error' => 'User not part of this chat'], 403);
        }

        $message = Message::create([
            'chat_id' => $validated['chat_id'],
            'user_id' => $validated['user_id'],
            'content' => $validated['content'],
        ]);

        return response()->json($message, 201);
    }

    public function getMessages(Request $request)
    {
        dd($request->user());

        $validated = $request->validate([
            'chat_id' => 'required|exists:chats,id',
        ]);

        $messages = Message::where('chat_id', $validated['chat_id'])
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages, 200);
    }

    public function deleteMessage(Request $request)
    {
        $validated = $request->validate([
            'message_id' => 'required|exists:messages,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $message = Message::findOrFail($validated['message_id']);

        if ($message->user_id !== $validated['user_id']) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $message->delete();

        return response()->json(['success' => 'Message deleted'], 200);
    }
}
