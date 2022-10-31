<x-layout>
    @include('partials._navigation')
    <div class="container mx-auto w-3/5 bg-gray-50 mt-6 p-6 rounded flex items-center justify-around">
        <div class="p-5">
            <h1 class="mb-8 text-5xl text-center">{{ $user->username }}</h1>
            <h2 class="mb-8 align-middle"><i class="fas fa-envelope text-2xl mr-5"></i> {{ $user->email }}</h2>
            <h2 class="mb-8"><i class="fas fa-user-cog text-2xl mr-5"></i> {{ $user->admin_label }}</h2>
            <a href="{{ route('users.editprofile', ['user' => $user->id]) }}" class="text-white bg-teal-500 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                <i class="fas fa-edit"><span class="font-sans"> Edit Profile</span></i>
            </a>
        </div>
        <div>
            <img src="{{ $user->icon ? asset('storage/' . $user->icon) : asset('images/icon.png') }}" alt="icon" class="md-block w-48">
        </div>
    </div>
</x-layout>
