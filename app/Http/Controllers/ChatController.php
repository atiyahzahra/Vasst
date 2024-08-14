<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the chat messages.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all chat messages
        $chatMessages = ChatMessage::all();

        // Return a view with chat messages
        return view('chat.index', ['chatMessages' => $chatMessages]);
    }

    /**
     * Store a newly created chat message in storage and return a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $userMessage = $request->input('message');

        // Save user message to the database
        ChatMessage::create([
            'sender' => 'user',
            'message' => $userMessage,
        ]);

        // Generate response from the assistant
        $assistantResponse = '';
        if (stripos($userMessage, 'hello') !== false) {
            $assistantResponse = 'Hello! How can I assist you today?';
        } elseif (stripos($userMessage, 'help') !== false) {
            $assistantResponse = 'Sure! I can help you with your questions or tasks.';
        } else {
            $assistantResponse = 'I am sorry, I did not understand that. Can you please rephrase?';
        }

        // Save assistant's response to the database
        ChatMessage::create([
            'sender' => 'assistant',
            'message' => $assistantResponse,
        ]);

        return response()->json([
            'response' => $assistantResponse,
        ]);

    }
    
}
