<nav class="flex items-center justify-between bg-teal-500 p-6">
    <div class="flex-shrink-0 text-white">
        @if(auth()->user()->folders()->first())
            <a href="{{ route('tasks.index', ['folder' => auth()->user()->folders()->first()]) }}" class="font-semibold text-xl tracking-tight">TODO</a>
        @else
            <a href="#" class="font-semibold text-xl tracking-tight">TODO</a>
        @endif
    </div>

    <div class="flex items-center justify-between">
        <p class="text-white font-bold mr-2">Welcome {{ auth()->user()->username }}</p>
        <button id="dropdownDefault" data-dropdown-toggle="dropdown" type="button"> <img src="{{ auth()->user()->icon ? asset('storage/' . auth()->user()->icon) : asset('images/icon.png') }}" alt="icon" class="md-block object-cover rounded-full w-12"></button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                <li>
                    <a href="{{ route('users.show', ['user' => auth()->user()->id]) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="fas fa-user mr-1"></i>Profile
                    </a>
                </li>
                <li>
                    @if(auth()->user()->folders()->first())
                    <a href="{{ route('tasks.index', ['folder' => auth()->user()->folders()->first()]) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="fas fa-columns mr-1"></i>Dashboard
                    </a>
                    @endif
                </li>
                <li>
                @if(auth()->user()->is_admin)
                    <a href="/users" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="fas fa-cog mr-1"></i>Manage Users
                    </a>
                @endif
                </li>
                <li>
                    <form method="post" action="/logout" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        @csrf
                        <button type="submit" class="">
                            <i class="fas fa-running mr-1"></i>Logout
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>
