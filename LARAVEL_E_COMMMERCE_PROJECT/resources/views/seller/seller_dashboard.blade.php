<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard - {{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMDJ8u7tQO4E+JtB2UjYhT/T42f3Q7I1a0dJ3e1b7D6d75U/61fQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Applying your Welcome Page's base styles (since admin views use Tailwind classes like bg-[var(--...)] --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            :root {
                --color-primary-bg: #FDFDFC;
                --color-header-bg: #ffffff; 
                --color-primary-text: #1b1b18;
                --color-border-subtle: #e3e3e0;
                --color-accent-peach: #FFC89C;
                --color-secondary-grey: #6b7280;
            }
            body {
                font-family: 'Instrument Sans', sans-serif;
            }
        </style>
    @endif

    {{-- A spot for page-specific CSS --}}
    @stack('styles')

    <style>
        /* CSS to make text bold on hover for all sidebar links */

        /* Target the main navigation links */
        #accordionSidebar .nav-link:hover span {
            font-weight: bold !important;
        }

        /* Target the submenu collapse items */
        #accordionSidebar .collapse-item:hover {
            font-weight: bold !important;
        }
        
        #accordionSidebar .nav-item.active .nav-link span {
            font-weight: bold; 
        }
    </style>
</head>
<body class="bg-[var(--color-primary-bg)] text-[var(--color-primary-text)] min-h-screen flex antialiased">
    
    <div id="wrapper" class="flex flex-grow"> 
        
        @include('seller.sidebar')

        <div id="content-wrapper" class="flex flex-col flex-grow">

            <main id="content" class="flex-grow p-4 sm:p-6 lg:p-8">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    {{-- Main JavaScript bundle (from your welcome page code) --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        {{-- Vite already included above, this is for older Mix setups --}}
    @else
        <script src="{{ asset('js/app.js') }}"></script>
    @endif
    
    {{-- A spot for page-specific JavaScript --}}
    @stack('scripts') 

</body>
</html>