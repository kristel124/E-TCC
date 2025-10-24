<header>
    <nav class="fixed top-0 left-0 w-full z-50 flex items-center justify-between px-8 py-4 bg-[#f4ede4]/95 backdrop-blur-md shadow-md transition">

        <h1 class="text-2xl font-bold tracking-wide text-[#6b6159] mr-6">TC<span class="text-[#a58c63]">C</span></h1>

        <div class="hidden lg:flex items-center flex-grow justify-between">
            <ul class="flex gap-8 text-base font-medium">
                <li class="nav-item">
                    <a class="nav-link text-[#6b6159] hover:text-[#c87a2e]" href="{{ route('user.user_page') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-[#6b6159] hover:text-[#c87a2e]" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-[#6b6159] hover:text-[#c87a2e]" href="#">Cart</a>
                </li>
            </ul>

            <form action="#" method="GET" class="flex">
                <input type="text" name="query" placeholder="Search products..."
                    class="px-3 py-2 text-sm rounded-l-lg border border-[#e3e3e0] bg-[#fffaf5] text-[#1b1b18] focus:border-[#c6a77b] focus:ring-1 focus:ring-[#e3c292] outline-none w-64">
                <button type="submit" class="bg-[#975519] text-white px-4 py-2 rounded-r-lg hover:bg-[#c87a2e] transition text-sm">Search</button>
            </form>
        </div>

        <div class="flex items-center gap-4 lg:ml-6">

            <ul class="flex items-center gap-4 text-base font-medium">
                @auth
                    <li class="text-[#6b6159] hidden sm:block">Welcome, {{ Auth::user()->name }}!</li>
                    <li>
                        <a class="text-[#975519] hover:text-[#c87a2e] transition" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endauth
                @guest
                    <li>
                        <a class="text-[#975519] hover:text-[#c87a2e] transition" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
            </ul>

            <button class="lg:hidden p-2 rounded-lg text-[#975519] border border-[#e3e3e0] hover:bg-[#f2f2f2]" 
                type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </nav>
</header>