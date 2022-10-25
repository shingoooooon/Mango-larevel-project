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
                    <td>{{ $user->is_admin }}</td>
                    <td><a href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="#">
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
