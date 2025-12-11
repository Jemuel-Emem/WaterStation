<div class="p-4 border rounded">
    <div class="h-64 overflow-y-auto mb-2 border p-2">
        @foreach($chats as $chat)
            <div class="{{ $chat->sender_type == 'user' ? 'text-right' : 'text-left' }}">
                <span class="inline-block p-2 rounded {{ $chat->sender_type == 'user' ? 'bg-blue-200' : 'bg-gray-200' }}">
                    {{ $chat->message }}
                </span>
            </div>
        @endforeach
    </div>

    <form wire:submit.prevent="sendMessage" class="flex">
        <input type="text" wire:model="message" class="flex-1 p-2 border rounded" placeholder="Type a message...">
        <button type="submit" class="ml-2 px-4 bg-blue-600 text-white rounded">Send</button>
    </form>
</div>
