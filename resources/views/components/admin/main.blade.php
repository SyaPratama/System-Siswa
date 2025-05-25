<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    {{-- Flow Bite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <title>{{ $title ?? 'Dashboard System Information' }}</title>
    @vite('resources/css/app.css')
    {{-- @vite('resources/css/extends.css') --}}

</head>

<body class="text-gray-800 font-inter">
    <!--sidenav -->
    @extends('components.admin.component.sidenav')
    <!-- end sidenav -->
    <div class="p-3 py-20 sm:ml-64 min-h-screen dark:bg-slate-700">
        @yield('content')
    </div>
</body>

</html>
