<x-layout>
    <div class="container border mx-auto w-1/3 p-6 mt-32">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-10">
                Login
            </h2>
        </header>
        <form method="post" action="/authenticate">
            @csrf
            <div class="relative z-0 mb-10 w-full group">
                <input type="text" name="login" id="login" value="{{ old('login') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="login" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email or Username</label>
                @error('login')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative z-0 mb-10 w-full group">
                <input type="password" name="password" id="password" value="{{ old('password') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Login</button>
            </div>
            <p class="mt-8">No account yet?
                <a href="/register" class="text-teal-600">Register</a>
            </p>
        </form>
    </div>
</x-layout>
