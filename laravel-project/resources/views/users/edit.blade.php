<x-layout>
@include('partials._navigation')
    <div class="container border mx-auto w-1/3 p-6 mt-32">
        <form method="post" action=" {{ route('users.update', ['user' => $user->id]) }}">
            @method('PATCH')
            @csrf
            <h1 class="text-2xl mb-5 text-center">Edit user</h1>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="username" id="username" value="{{ old('name') ?? $user->username }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                @error('username')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="email" name="email" id="email" value="{{ old('email') ?? $user->email }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="is_admin" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Admin</label>
                <select name="is_admin" id="is_admin" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                    @foreach(\App\Models\User::STATUS as $key => $val)
                        <option value="{{ $key }}" {{ $key == old('is_admin', $user->is_admin) ? 'selected' : '' }} >
                            {{ $val['label'] }}
                        </option>
                    @endforeach
                </select>
                @error('is_admin')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

{{--            <div class="flex items-center mb-4">--}}
{{--                <input name="is_admin" id="is_admin" type="checkbox" value="{{ old('is_admin' ?? $user->is_admin) }}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">--}}
{{--                <label for="is_admin" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</label>--}}
{{--            </div>--}}

{{--            <label for="is_admin" class="inline-flex relative items-center cursor-pointer">--}}
{{--                <input type="checkbox" name="is_admin" id="is_admin" class="sr-only peer" value="{{ old('is_admin' ?? $user->is_admin) }}">--}}
{{--                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>--}}
{{--                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</span>--}}
{{--            </label>--}}

            <div class="flex items-center justify-between">
                <button type="submit" class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Update</button>
                <a href="{{ route('users.index') }}" class="text-white bg-slate-500 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                    <i class="fas fa-undo"></i>
                </a>
            </div>
        </form>
    </div>
</x-layout>
