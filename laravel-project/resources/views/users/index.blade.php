<x-layout>
@include('partials._navigation')
    <div class="container mx-auto">
        <div class="w-full bg-gray-50 p-4 mt-6 rounded">
            <h1 class="text-center text-xl font-bold my-10">Users List</h1>
            <table class="w-full border-separate border border-slate-400">
                <thead>
                    <tr>
                        <th class="border border-slate-300 p-4 w-24">ID</th>
                        <th class="border border-slate-300">Username</th>
                        <th class="border border-slate-300">Email</th>
                        <th class="border border-slate-300">Admin</th>
                        <th class="border border-slate-300">Edit</th>
                        <th class="border border-slate-300">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users) == 1)
                    <tr class="text-center">
                        <td colspan="6" class="border border-slate-300 py-3">No users found</td>
                    </tr>
                    @endif

                    @foreach($users as $user)
                    @if($user != auth()->user())
                    <tr class="text-center">
                        <td class="border border-slate-300 p-3">{{ $user->id }}</td>
                        <td class="border border-slate-300 text-left pl-2">{{ $user->username }}</td>
                        <td class="border border-slate-300 text-left pl-2">{{ $user->email }}</td>
                        <td class="border border-slate-300">{{ $user->admin_label }}</td>
                        <td class="border border-slate-300">
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                                <i class="fas fa-edit hover:text-gray-400"></i>
                            </a>
                        </td>
                        <td class="border border-slate-300">
                            <form method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash-alt hover:text-red-400"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@include('partials._footer')
</x-layout>
