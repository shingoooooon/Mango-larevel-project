<x-layout>
    <div class="container mx-auto">
        <table class="w-full">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Admin</th>
            </thead>
            <tbody>
            @if(count($users) == 0)
                <tr class="text-center">
                    <td>No users found.</td>
                </tr>
            @endif
            @foreach($users as $user)
                <tr class="text-center">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->admin_label }}</td>
                    <td><a href="{{ route('users.edit', ['user' => $user->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
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
</x-layout>
