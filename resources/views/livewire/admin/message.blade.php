<div class="flex gap-4 h-[500px]">
    <!-- User List -->
    <div class="w-1/4 border rounded-lg shadow p-4 bg-white overflow-y-auto">
        <h2 class="font-bold mb-4 text-lg text-gray-700">Users</h2>
        @foreach($users as $user)
            <div
                wire:click="$set('userId', {{ $user->id }})"
                class="cursor-pointer p-3 rounded-lg mb-2 hover:bg-blue-100 flex items-center gap-2 {{ $userId == $user->id ? 'bg-blue-100 font-semibold' : '' }}">
                <div class="w-3 h-3 rounded-full {{ $user->is_online ? 'bg-green-500' : 'bg-gray-400' }}"></div>
                <span>{{ $user->name }}</span>
            </div>
        @endforeach
    </div>

    <!-- Chat Box -->
    <div class="flex-1 border rounded-lg shadow flex flex-col bg-gray-50">
        @if($userId)
            <!-- Messages -->
            <div class="flex-1 p-4 overflow-y-auto space-y-2" id="chatBox">
                @foreach($chats as $chat)
                    <div class="flex {{ $chat->sender_type == 'admin' ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[70%] p-3 rounded-xl break-words relative
                                    {{ $chat->sender_type == 'admin' ? 'bg-green-200 text-gray-800 rounded-tr-none' : 'bg-white text-gray-700 rounded-tl-none' }}">
                            <p>{{ $chat->message }}</p>
                            <span class="text-xs text-gray-500 absolute bottom-1 right-2">
                                {{ $chat->created_at->format('H:i') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Input -->
            <form wire:submit.prevent="sendMessage" class="flex p-4 border-t bg-white">
                <input
                    type="text"
                    wire:model="message"
                    class="flex-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Type a message...">
                <button
                    type="submit"
                    class="ml-2 px-6 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                    Send
                </button>
            </form>
        @else
            <div class="flex items-center justify-center h-full text-gray-400">
                <p>Select a user to start chatting.</p>
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        const chatBox = document.getElementById('chatBox');
        if(chatBox) {
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        Livewire.hook('message.processed', (message, component) => {
            if(chatBox) {
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        });
    });
</script>
