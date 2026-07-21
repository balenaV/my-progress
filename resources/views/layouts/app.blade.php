<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'My Progress')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-neutral-50 text-neutral-900 antialiased">
    <header class="border-b border-neutral-200 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
            <a href="{{ route('home') }}" class="text-xl font-semibold text-primary-800">
                My Progress
            </a>

            <a href="/admin" class="rounded-lg border border-neutral-200 px-4 py-2 text-sm font-medium">
                Área administrativa
            </a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
