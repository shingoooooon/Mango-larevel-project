<x-layout>
@include('partials._navigation')
    <div class="container mx-auto w-1/3 bg-gray-50 mt-6 p-6 rounded flex items-center justify-around">
        <div class="p-5">
            <h1 class="mb-12 text-5xl text-center">{{ $user->username }}</h1>
            <img src="{{ $user->icon ? asset('storage/' . $user->icon) : asset('images/icon.png') }}" alt="icon" class="md-block object-cover rounded-full border w-48 h-48 mb-12 ">
            <h2 class="mb-12 align-middle"><i class="fas fa-envelope text-2xl mr-5"></i> {{ $user->email }}</h2>
            <h2 class="mb-16"><i class="fas fa-user-cog text-2xl mr-5"></i> {{ $user->admin_label }}</h2>
            <div class="text-center">
                <a href="{{ route('users.editprofile', ['user' => $user->id]) }}" class="text-white bg-teal-500 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                    <i class="fas fa-edit"><span class="font-sans"> Edit Profile</span></i>
                </a>
            </div>
        </div>
    </div>
@include('partials._footer')
</x-layout>
