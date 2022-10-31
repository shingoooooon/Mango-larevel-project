<x-layout>
    @include('partials._navigation')
    <div class="container border mx-auto w-1/3 p-6 mt-32">
        <form method="post" action="{{ route('update-password') }}" >
            @csrf
            <h1 class="text-2xl mb-5 text-center">Change Password</h1>
            @if (session('status'))
                <div class="bg-teal-100 border border-teal-400 text-teal-700 px-4 py-3 mb-4 rounded" role="alert">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="relative z-0 mb-6 w-full group">
                <input type="password" name="old_password" id="old_password" value="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="old_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                @error('old_password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="password" name="new_password" id="new_password" value="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="new_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">New Password</label>
                @error('new_password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" value="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="new_password_confirmation" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm New Password</label>
                @error('new_password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="block mx-auto text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-7 py-2.5">Update</button>
        </form>
    </div>
@include('partials._footer')
</x-layout>
