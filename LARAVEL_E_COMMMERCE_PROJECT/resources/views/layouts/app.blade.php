<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <!-- Custom Neutral Beige Theme -->
    <style>
        /* Base Page */
        body {
            background: linear-gradient(180deg, #f3e3d5 0%, #f9f3ee 100%);
            font-family: 'Poppins', sans-serif;
            color: #1b1b18;
        }

        /* Navigation Banner */
        .bg-gray-100 {
            background-color: #f3e3d5 !important;
        }

        .bg-white {
            background-color: #FDFDFC !important;
        }

        header.bg-white.shadow {
            background-color: #fdfdfc !important;
            box-shadow: 0 2px 10px rgba(155, 121, 87, 0.1);
        }

        /* Containers */
        main {
            background-color: transparent;
        }

        /* Form Styles */
        input, select, textarea {
            border: 1px solid #e3e3e0 !important;
            border-radius: 8px !important;
            padding: 0.6rem 0.75rem !important;
            background-color: #fffaf5 !important;
            transition: all 0.2s ease;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #c6a77b !important;
            box-shadow: 0 0 0 3px rgba(227, 194, 146, 0.3) !important;
            outline: none !important;
        }

        /* Buttons */
        button, .btn, .inline-flex.items-center {
            background-color: #975519 !important;
            color: #FDFDFC !important;
            border: none !important;
            border-radius: 8px !important;
            padding: 0.6rem 1.25rem !important;
            font-weight: 600 !important;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        button:hover, .btn:hover, .inline-flex.items-center:hover {
            background-color: #c87a2e !important;
            transform: translateY(-1px);
        }

        /* Links */
        a {
            color: #975519;
            transition: color 0.2s ease;
        }

        a:hover {
            color: #c87a2e;
        }

        /* Validation */
        .text-red-600 {
            color: #b84a4a !important;
        }

        /* Typography */
        label {
            color: #6b6159;
            font-weight: 500;
        }

        /* Rounded container for cards/forms */
        .auth-card, .shadow, .rounded-md {
            border-radius: 12px !important;
            border-color: #e3e3e0 !important;
        }

        /* Smooth transition */
        * {
            transition: background-color 0.25s ease, color 0.25s ease, border-color 0.25s ease;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    @livewireScripts
</body>
</html>
