<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>TODO</title>
</head>
<body>
<nav class="flex items-center justify-between bg-teal-500 p-6">
    <div class="flex-shrink-0 text-white">
        <a href="#" class="font-semibold text-xl tracking-tight">TODO</a>
    </div>
    <div class="flex">
        <a href="#" class="text-teal-200 hover:text-white mr-4">
            Register
        </a>
        <a href="#" class="text-teal-200 hover:text-white mr-4">
            Login
        </a>
    </div>
</nav>
<main>
    {{ $slot }}
</main>
<foooter>

</foooter>
</body>
</html>
