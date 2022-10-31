<nav class="flex items-center justify-between bg-teal-500 p-6">
    <div class="flex-shrink-0 text-white">
        @if(auth()->user()->folders()->first())
            <a href="{{ route('tasks.index', ['folder' => auth()->user()->folders()->first()]) }}" class="font-semibold text-xl">TODO</a>
        @else
            <a href="#" class="font-semibold text-xl">TODO</a>
        @endif
    </div>

    <div class="flex items-center justify-between">
        <p class="text-white font-bold mr-2">Welcome {{ auth()->user()->username }}</p>
        <button id="dropdownDefault" data-dropdown-toggle="dropdown" type="button">
            <img src="{{ auth()->user()->icon ? asset('storage/' . auth()->user()->icon) : asset('images/icon.png') }}" alt="icon" class="md-block object-cover rounded-full w-12">
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
            <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownDefault">
                <li>
                    <a href="{{ route('users.show', ['user' => auth()->user()->id]) }}" class="block py-2 px-4 hover:bg-gray-100">
                        <i class="fas fa-user mr-1"></i>Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('change-password') }}" class="block py-2 px-4 hover:bg-gray-100">
                        <i class="fas fa-key mr-1"></i>Change Password
                    </a>
                </li>
                @if(auth()->user()->folders()->first())
                <li>
                    <a href="{{ route('tasks.index', ['folder' => auth()->user()->folders()->first()]) }}" class="block py-2 px-4 hover:bg-gray-100">
                        <i class="fas fa-columns mr-1"></i>Dashboard
                    </a>
                </li>
                @endif
                @if(auth()->user()->is_admin)
                <li>
                    <a href="{{ route('users.index') }}" class="block py-2 px-4 hover:bg-gray-100">
                        <i class="fas fa-cog mr-1"></i>Manage Users
                    </a>
                </li>
                @endif
                <li>
                    <form method="post" action="{{ route('logout') }}" class="block py-2 px-4 hover:bg-gray-100">
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
