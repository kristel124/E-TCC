<header class="w-full flex items-center justify-between py-4 px-6 border-b border-gray-200 bg-[#f4ede4]/95 shadow-sm fixed top-0 z-50">
    <h1 class="text-2xl font-bold tracking-wide">TC<span class="text-[#a58c63]">C</span></h1>

    <div class="flex items-center gap-4">
        <div class="flex flex-grow max-w-lg mx-4"> 
            <input 
                type="text" 
                placeholder="Search anything" 
                {{-- SIMPLIFICATION: Using the 'input' base styles and a new class for focus. --}}
                class="border rounded-l-full rounded-r-none pl-2 py-1 italic text-gray-700 w-80 custom-focus-input"
            >
            {{-- SIMPLIFICATION: Added custom-button for the hover effect and reduced background styles. --}}
            <button class="bg-[#e4c3aa] hover:bg-[#d2b297] p-2 rounded-r-full transition flex items-center justify-center h-full custom-button">
                search
            </button>
        </div>

        <nav class="flex items-center gap-4" aria-label="Header Navigation and Actions">
            <div class="flex items-center gap-4">
                
                {{-- Cart Icon --}}
                {{-- Link styling is covered by the custom CSS 'a' tag selector. --}}
                <a href="#" class="text-gray-800 hover:text-[#b49a75] transition relative" aria-label="View Cart">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.6 8h13.2L17 13M9 21a1 1 0 1 1-2 0m10 0a1 1 0 1 1-2 0" />
                    </svg>
                </a>

                {{-- CONTENT FOR AUTHENTICATED USER (Profile Icon + Name/Logout) --}}
                @auth
                    {{-- The hover:bg-[#f4ede4] is specific and kept. The profile icon colors are kept but also benefit from the 'a' tag's 'a:hover' color. --}}
                    <a href="{{ route('logout') }}"
                    class="flex items-center gap-2 p-2 rounded-lg hover:bg-[#f4ede4] transition cursor-pointer group"
                    aria-label="User Profile and Logout"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        
                        {{-- Profile Icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#5a5245] group-hover:text-[#b49a75]" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>

                        {{-- User Name / Logout text --}}
                        <span class="text-[#5a5245] text-sm font-medium hidden sm:inline group-hover:text-[#b49a75]">
                            {{ Auth::user()->name }}
                        </span>
                    </a>
                    
                    {{-- Hidden Logout Form --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

                @endauth
                
                {{-- CONTENT FOR GUEST USER --}}
                @guest
                    {{-- SIMPLIFICATION: Added custom-button class to benefit from hover and transition. --}}
                    <a href="{{ route('login') }}" class="bg-[#b49a75] text-white px-4 py-2 rounded-xl hover:bg-[#a28761] transition text-sm hidden sm:inline-flex custom-button">
                        Login
                    </a>
                @endguest
            </div>
        </nav>
    </div>
</header>