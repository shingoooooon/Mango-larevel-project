<x-layout>
@include('partials._navigation')
    <div class="container mx-auto">
        <div class="p-4 w-full bg-gray-50 ml-4 font-light rounded">
            <div class="text-center border-b border-gray-200">
                <h1 class="text-xl font-bold my-10">Users List</h1>
            </div>
            <table class="w-full border-separate border border-slate-400">
                <thead>
                    <tr>
                        <th class="border border-slate-300 p-4 w-24">User_id</th>
                        <th class="text-left border border-slate-300 p-4">Username</th>
                        <th class="text-left border border-slate-300 pl-2">Email</th>
                        <th class="border border-slate-300">Admin</th>
                        <th class="border border-slate-300">Edit</th>
                        <th class="border border-slate-300">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($users) == 0)
                    <tr class="text-center">
                        <td>No users found.</td>
                    </tr>
                @endif
                @foreach($users as $user)
                    <tr class="text-center">
                        <td class="border border-slate-300 p-3">{{ $user->id }}</td>
                        <td class="border border-slate-300 text-left p-3">{{ $user->username }}</td>
                        <td class="border border-slate-300 text-left pl-2">{{ $user->email }}</td>
                        <td class="border border-slate-300">{{ $user->admin_label }}</td>
                        <td class="border border-slate-300"><a href="{{ route('users.edit', ['user' => $user->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="border border-slate-300">
                            <form method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}">
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
        </div>
    </div>
</x-layout>
