<x-layout>
@include('partials._navigation')
    <div class="container text-center mx-auto w-1/2 p-6 mt-64">
        <h1 class="text-xl mb-10">Welcome {{ auth()->user()->username }}🎉</h1>
        <a href="{{ route('folders.create') }}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold text-xl py-6 px-10 rounded">Create your first folder</a>
    </div>
</x-layout>
