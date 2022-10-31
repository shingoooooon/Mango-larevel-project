<x-layout>
@include('partials._navigation')
    <div class="container border mx-auto w-1/3 p-6 mt-32">
        <form method="post" action=" {{ route('users.update', ['user' => $user->id]) }}">
            @method('PATCH')
            @csrf
            <h1 class="text-2xl mb-5 text-center">Edit user</h1>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="username" id="username" value="{{ old('name') ?? $user->username }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                @error('username')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="email" name="email" id="email" value="{{ old('email') ?? $user->email }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center mb-6">
                <input type="hidden" name="is_admin" value="0">
                <input {{ $user->is_admin ? 'checked' : '' }} name="is_admin" id="is_admin" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                <label for="is_admin" class="ml-2 text-sm font-medium text-gray-900">Admin</label>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update</button>
                <a href="{{ route('users.index') }}" class="text-white bg-slate-500 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center">
                    <i class="fas fa-undo"></i>
                </a>
            </div>
        </form>
    </div>
@include('partials._footer')
</x-layout>
