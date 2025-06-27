<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Optional Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100">

    {{-- 🔼 Navigation --}}
    <header class="mb-6 shadow-sm bg-white dark:bg-gray-800">
        @include('layouts.navigation') {{-- Breeze navigation --}}
    </header>

    {{-- 🔽 Page Content --}}
    <main class="px-4 sm:px-8 md:px-16 lg:px-24 xl:px-32 py-6">
        @yield('content')
    </main>

    {{--  Footer --}}
    <footer class="text-center py-6 text-sm text-gray-500 dark:text-gray-400">
        &copy; {{ date('Y') }} Task Manager by Kavita Bisht 💜
    </footer>
</body>

</html>
