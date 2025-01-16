<div x-data="{ activeChat2: null }">
    @foreach($chats as $chat)
        <button
            class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2 dark:hover:bg-gray-700"
            :class="{ 'bg-gray-100 dark:bg-gray-700': activeChat2 === '{{ $chat->id }}' }"
            x-on:click="activeChat2 = '{{ $chat->id }}'; $dispatch('chat-changed', { chatId: '{{ $chat->id }}' })"
        >
            <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                H
            </div>
            <div class="ml-2 text-sm font-semibold dark:text-gray-100">
                {{ $chat->name }}
            </div>
        </button>
    @endforeach
</div>
