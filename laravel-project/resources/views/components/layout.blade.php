<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>TODO</title>
</head>
<body>
<nav class="flex items-center justify-between bg-teal-500 p-6">
    <div class="flex-shrink-0 text-white">
        @auth
            @if(auth()->user()->folders()->first())
            <a href="{{ route('tasks.index', ['folder' => auth()->user()->folders()->first()]) }}" class="font-semibold text-xl tracking-tight">TODO</a>
            @else
            <a href="#" class="font-semibold text-xl tracking-tight">TODO</a>
            @endif
        @else
        <a href="/login" class="font-semibold text-xl tracking-tight">TODO</a>
        @endauth
    </div>
    <div class="flex">
        @auth
        <span class="font-bold uppercase">Welcome {{ auth()->user()->name }}</span>
            @if(auth()->user()->is_admin)
            <a href="/users" class="text-teal-200 hover:text-white ml-4">
                <i class="fas fa-cog"></i>Manage Users
            </a>
            @endif
            <form method="post" action="/logout">
                @csrf
                <button type="submit" class="text-teal-200 hover:text-white ml-4">
                    <i class="fas fa-running mr-1"></i>Logout
                </button>
            </form>
        @else
        <a href="/register" class="text-teal-200 hover:text-white mr-4">
            <i class="fas fa-user-plus mr-1"></i>Register
        </a>
        <a href="/login" class="text-teal-200 hover:text-white mr-4">
            <i class="fa-solid fa-right-from-bracket mr-1"></i>Login
        </a>
        @endauth
    </div>
</nav>
<main>
    {{ $slot }}
</main>
<foooter>

</foooter>
<x-flash-message></x-flash-message>
</body>
</html>
