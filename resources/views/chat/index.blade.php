@extends('layouts.app')

@section('title', 'Vasst Chat')

@section('content')
    <div class="chat-container mt-5">
        <div class="chat-box-container">
            <div class="d-flex justify-content-between mb-3">
                <button class="btn btn-custom" id="new-chat-btn">New Chat</button>
            </div>

            <div class="chat-box p-4" id="chat-box">
                <!-- Chat history will be appended here -->
                @foreach($chatMessages as $chatMessage)
                    <div class="message {{ $chatMessage->sender == 'user' ? 'user-message' : 'assistant-message' }}">
                        <strong>{{ strtolower($chatMessage->sender) }}</strong>
                        <p>{{ $chatMessage->message }}</p>
                    </div>
                @endforeach
            </div>

            <form id="chat-form" class="mt-4" action="{{ route('chat.store') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" id="user-input" name="message" class="form-control" placeholder="Ask me anything..." required>
                    <div class="input-group-append">
                        <button class="btn btn-custom" type="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .chat-container {
            max-width: 1200px;
            width: 100%;
        }

        .chat-box-container {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            height: 500px;
            display: flex;
            flex-direction: column;
        }

        .chat-box {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .message {
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
        }

        .message p {
            margin: 0;
            padding: 10px;
            border-radius: 5px;
            background-color: #f1f1f1;
            display: inline-block;
            max-width: 70%;
        }

        .message strong {
            font-size: 0.9rem;
            color: #333;
            margin-bottom: 5px;
        }

        .user-message {
            align-items: flex-end;
            text-align: right;
        }

        .user-message p {
            background-color: #d1e7dd;
            border-radius: 15px 15px 0 15px;
        }

        .assistant-message {
            align-items: flex-start;
            text-align: left;
        }

        .assistant-message p {
            background-color: #f8d7da;
            border-radius: 15px 15px 15px 0;
        }

        #user-input {
            border-radius: 0 0 0 8px;
        }

        .input-group-append .btn {
            border-radius: 0 0 8px 0;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>

    <script>
        document.getElementById('chat-form').addEventListener('submit', function(event) {
            event.preventDefault();

            // Ambil input dari pengguna
            let userInput = document.getElementById('user-input').value;
            let chatBox = document.getElementById('chat-box');

            // Tambahkan pesan pengguna ke dalam kotak chat
            let userMessage = document.createElement('div');
            userMessage.className = 'message user-message';
            userMessage.innerHTML = `<strong>User</strong><p>${userInput}</p>`;
            chatBox.appendChild(userMessage);

            // Bersihkan input
            document.getElementById('user-input').value = '';

            // Contoh respons sederhana dari asisten
            let assistantResponse = '';
            if (userInput.toLowerCase().includes('hello')) {
                assistantResponse = 'Hello! How can I assist you today?';
            } else if (userInput.toLowerCase().includes('help')) {
                assistantResponse = 'Sure! I can help you with your questions or tasks.';
            } else {
                assistantResponse = 'I am sorry, I did not understand that. Can you please rephrase?';
            }

            // Tambahkan respons asisten ke dalam kotak chat
            let assistantMessage = document.createElement('div');
            assistantMessage.className = 'message assistant-message';
            assistantMessage.innerHTML = `<strong>vasst</strong><p>${assistantResponse}</p>`;
            chatBox.appendChild(assistantMessage);

            // Gulir ke bawah untuk menampilkan pesan terbaru
            chatBox.scrollTop = chatBox.scrollHeight;

            // Simpan pesan ke server atau local storage jika diperlukan
            // (Penggunaan backend controller atau AJAX bisa dilakukan untuk penyimpanan lebih lanjut)
        });

        // Fungsi untuk memulai chat baru
        document.getElementById('new-chat-btn').addEventListener('click', function() {
            document.getElementById('chat-box').innerHTML = '';
            document.getElementById('user-input').value = '';
        });
    </script>
@endsection
