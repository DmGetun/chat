<form wire:submit.prevent="save" class="flex flex-col">
    <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4 dark:bg-gray-700">
        <div>
            <label for="icon-file-upload"
                   class="cursor-pointer inline-flex items-center justify-center p-2 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none focus:bg-gray-300 transition duration-150 ease-in-out">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                </svg>
            </label>
            <input wire:model="file" id="icon-file-upload" type="file" class="hidden" multiple />
        </div>
        <div class="flex-grow ml-4">
            <div class="relative w-full">
                <input wire:model="text" type="text" class="dark:bg-gray-700 dark:text-gray-100 flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"/>
                <button class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </button>
            </div>
            @error('text') <span class="error dark:text-gray-200">{{ $message }}</span> @enderror
        </div>
        <div class="ml-4">
            <button type="submit" class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                <span>{{__('info.Send')}}</span>
                <span class="ml-2">
                                    <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </span>
            </button>
        </div>
    </div>
    <div wire:loading wire:target="file" class="w-48 h-48 dark:text-gray-100">Loading...</div>
    @if($file)
    <div class="items-center h-48 rounded-xl bg-white w-full px-4 dark:bg-gray-700">
            <img src="{{ $file->temporaryUrl() }}" class="w-48 h-48">

        @error('file') <span class="error dark:text-gray-200">{{ $message }}</span> @enderror
    </div>
    @endif
</form>
