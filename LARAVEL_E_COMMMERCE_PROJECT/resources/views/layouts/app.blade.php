<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-[#f5f0e6] text-[#3b3226]">
    <!-- Banner -->
    <x-banner />

    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-[#fef9f4] shadow-md">
            @livewire('navigation-menu')
        </nav>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-[#fdf7ef] shadow-md">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-semibold text-[#5c4c3c]">
                        {{ $header }}
                    </h1>
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="flex-1 bg-[#f5f0e6] py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Card wrapper -->
                <div class="space-y-6">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    @stack('modals')
    @livewireScripts
</body>
</html>
