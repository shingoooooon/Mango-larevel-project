<x-layout>
@include('partials._navigation')
    <div class="container mx-auto">
        <div class="flex w-full min-w-full rounded-sm mt-4">

            <div class="w-1/4 md:w-2/6 font-light bg-gray-50 rounded">
                <div class="flex items-center justify-between border-b border-gray-200 p-3">
                    <div class="text-black font-bold uppercase text-lg py-5 px-5">Folders</div>
                    <a href="{{ route('folders.create') }}" class="text-white bg-teal-500 hover:bg-teal-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <i class="fas fa-plus"></i></a>
                </div>
                @foreach($folders as $folder)
                <div>
                    <a class="flex items-center justify-between block py-3 px-5 {{ $current_folder->id === $folder->id ? 'bg-teal-400' : '' }}" href="/folders/{{ $folder->id }}/tasks" >
                        <div class="{{ $current_folder->id === $folder->id ? 'text-white' : 'text-gray-700' }}">
                            {{ $folder->title }}
                        </div>
                        <form method="post" action="{{ route('folders.destroy', ['folder' => $folder->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="p-4 w-full bg-gray-50 ml-4 font-light rounded">
                <div class="flex items-center justify-between border-b border-gray-200">
                    <div class="text-black font-bold uppercase text-sm py-5 px-5"><span class="text-lg">{{ $current_folder->title }}</span>->Tasks</div>
                    <a href="{{ route('tasks.create', ['folder' => $current_folder->id]) }}" class="text-white bg-teal-500 hover:bg-teal-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <i class="fas fa-plus mr-1"></i>Add task</a>
                </div>
                <table class="w-full border">
                    <thead class="border">
                        <th class="border">Name</th>
                        <th class="border">Status</th>
                        <th class="border">Due Date</th>
                        <th class="border">Edit</th>
                        <th class="border">Delete</th>
                    </thead>
                    <tbody>
                    @if(count($tasks) == 0)
                    <tr class="text-center">
                        <td>No tasks found.</td>
                    </tr>
                    @endif
                    @foreach($tasks as $task)
                    <tr class="text-center border text-align">
                        <td class="border p-3">{{ $task->name }}</td>
                        <td class="{{ $task->status_class }} mr-0 mt-3 border">{{ $task->status_label }}</td>
                        <td class="border">{{ $task->due_date }}</td>
                        <td class="border"><a href="{{ route('tasks.edit', ['folder' => $task->folder_id, 'task' => $task->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('tasks.destroy', ['folder' => $task->folder_id, 'task' => $task->id]) }}">
                            @csrf
                            @method('DELETE')
                                <button onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-6">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
