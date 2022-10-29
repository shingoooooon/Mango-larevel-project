<x-layout>
    @include('partials._navigation')
    <div class="container mx-auto">
        <div class="p-4 w-full bg-gray-50 mt-6 rounded">
            <div class="text-center border-b border-gray-200">
                <h1 class="text-xl font-bold my-10">Profile</h1>
                <a href="{{ route('users.editprofile', ['user' => $user->id]) }}">
                    <i class="fas fa-edit hover:text-gray-400"></i>
                </a>
            </div>
            <img src="{{ $user->icon ? asset('storage/' . $user->icon) : asset('images/icon.png') }}" alt="icon" class="md-block w-48">
            <p>{{ $user->username }}</p>
            <p>{{ $user->email }}</p>
            <p>{{ $user->password }}</p>
        </div>
    </div>
</x-layout>
