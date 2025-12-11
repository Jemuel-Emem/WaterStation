<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class Message extends Component
{
    public $message = '';
    public $userId;

    public function sendMessage()
    {
        $this->validate(['message' => 'required|string', 'userId' => 'required|exists:users,id']);

        Chat::create([
            'user_id' => $this->userId,
            'admin_id' => Auth::id(),
            'message' => $this->message,
            'sender_type' => 'admin',
        ]);

        $this->message = '';
    }

    public function render()
    {
        $users = \App\Models\User::where('role', 0)->get();
        $chats = $this->userId ? Chat::where('user_id', $this->userId)->orderBy('created_at')->get() : [];

        return view('livewire.admin.message', compact('users', 'chats'));
    }
}
