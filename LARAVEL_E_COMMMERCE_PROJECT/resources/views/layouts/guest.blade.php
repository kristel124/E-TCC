<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-[#fdf6f0] font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-[#fffaf5] shadow-lg rounded-2xl p-6">
            {{-- Logo slot --}}
            <div class="flex justify-center mb-6">
                {{ $logo ?? '' }}
            </div>

            {{-- Main slot --}}
            <div class="space-y-4 text-gray-800">
                {{ $slot }}
            </div>
        </div>
    </div>

    @livewireScripts
</body>
</html>
