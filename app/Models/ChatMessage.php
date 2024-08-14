<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'sender',
        'message',
    ];

    // Mendefinisikan relasi dengan model Conversation
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
