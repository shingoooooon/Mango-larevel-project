<x-layout>
    <div class="container mx-auto">
        <div class="flex w-full min-w-full rounded-sm mt-4">
            <div class="w-1/4 md:w-2/6 font-light mb-5 bg-gray-50 rounded">
                <div class="border-b border-gray-200">
                    <div class="text-black font-light uppercase text-sm py-5 px-5">Folders</div>
                </div>
                @if(count($folders) == 0)
                    <p>No folders found.</p>
                @endif
                @foreach($folders as $folder)
                <div>
                    <a class="block py-3 px-5" href="/folders/{{ $folder->id }}/tasks" >
                        <div class="text-gray-700">
                            {{ $folder->title }}
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="p-4 w-full bg-gray-50 ml-4 font-light mb-5 rounded">
                <div class="border-b border-gray-200">
                    <div class="text-black font-light uppercase text-sm py-5 px-5">Tasks</div>
                </div>
                @if(count($tasks) == 0)
                    <p>No tasks found.</p>
                @endif
                @foreach($tasks as $task)
                <div>
                    <p>{{ $task->name }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
