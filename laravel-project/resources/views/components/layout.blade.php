<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>TODO</title>
</head>
<body>
<nav class="flex items-center justify-between bg-teal-500 p-6">
    <div class="flex-shrink-0 text-white">
        <a href="#" class="font-semibold text-xl tracking-tight">TODO</a>
    </div>
    <div class="flex">
        @auth
        <span class="font-bold uppercase">Welcome {{ auth()->user()->name }}</span>
        <form method="post" action="/logout">
            @csrf
            <button type="submit" class="text-teal-200 hover:text-white mx-4">
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
</body>
</html>
