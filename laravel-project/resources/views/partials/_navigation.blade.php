<nav class="flex items-center justify-between bg-teal-500 p-6">
    <div class="flex-shrink-0 text-white">
        @if(auth()->user()->folders()->first())
            <a href="{{ route('tasks.index', ['folder' => auth()->user()->folders()->first()]) }}" class="font-semibold text-xl tracking-tight">TODO</a>
        @else
            <a href="#" class="font-semibold text-xl tracking-tight">TODO</a>
        @endif
    </div>
    <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="uppercase text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800" type="button">{{ auth()->user()->username }} <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
    <!-- Dropdown menu -->
    <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
            <li>
                <a href="{{ route('tasks.index', ['folder' => auth()->user()->folders()->first()]) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <i class="fas fa-columns mr-1"></i>Dashboard
                </a>
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
</nav>
