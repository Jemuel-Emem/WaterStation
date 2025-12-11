<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class Message extends Component
{
    public $message = '';
    public $adminId;

    public function sendMessage()
    {
        $this->validate(['message' => 'required|string']);

        Chat::create([
            'user_id' => Auth::id(),
            'admin_id' => $this->adminId,
            'message' => $this->message,
            'sender_type' => 'user',
        ]);

        $this->message = '';
    }

    public function render()
    {
        $chats = Chat::where('user_id', Auth::id())->orderBy('created_at')->get();

        return view('livewire.user.message', compact('chats'));
    }
}
