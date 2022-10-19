<x-layout>
    <div class="container mx-auto">
        <div class="flex w-full min-w-full rounded-sm mt-4">
            <!-- ASIDE -->
            <div class="w-1/4 md:w-2/6 font-light mb-5 bg-gray-50 rounded">
                <div class="border-b border-gray-200">
                    <div class="text-black font-light uppercase text-sm py-5 px-5">Folders</div>
                </div>
                @foreach($folders as $folder)
                <div>
                    <a class="block py-3 px-5" href="#">
                        <div class="text-gray-700">
                            {{ $folder->title }}
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="p-4 w-full bg-gray-50 ml-4 font-light mb-5 rounded">
                <h1>Tasks</h1>
            </div>
        </div>
    </div>
</x-layout>
