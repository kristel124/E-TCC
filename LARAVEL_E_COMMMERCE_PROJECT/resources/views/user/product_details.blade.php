<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tcc | Shop</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f5f0] text-[#2e2b26] font-sans">

  <!-- Navbar -->
  <nav class="fixed top-0 left-0 w-full z-50 flex items-center justify-between px-8 py-4 bg-[#f4ede4]/95 backdrop-blur-md shadow-md">
    <h1 class="text-2xl font-bold tracking-wide text-[#6b6159]">
      TC<span class="text-[#a58c63]">C</span>
    </h1>

    <div class="flex items-center gap-4">
      <!-- Search Bar -->
      <form action="{{ route('user.user_page') }}" method="GET" class="flex">
        <input 
          type="text" 
          name="search" 
          value="{{ request('search') }}"
          placeholder="Search bags..."
          class="px-3 py-2 text-sm rounded-l-lg border border-[#d6ccc2] bg-[#fffaf5] focus:ring-[#c6a77b] focus:border-[#c6a77b] outline-none w-64"
        >
        <button 
          type="submit" 
          class="bg-[#975519] text-white px-4 py-2 rounded-r-lg hover:bg-[#c87a2e] transition text-sm">
          Search
        </button>
      </form>

      <!-- Cart -->
      <a href="{{ route('user.cart.index') }}" class="flex items-center hover:text-[#c87a2e]">
        <img src="{{ asset('images/icons8-cart-24.png') }}" alt="Cart" class="w-6 h-6 hover:scale-110 transition-transform">
      </a>

      <!-- User -->
      @auth
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button 
          type="submit" 
          class="bg-[#975519] text-white px-3 py-2 rounded hover:bg-[#c87a2e] text-sm transition">
          {{ Auth::user()->name }}
        </button>
      </form>
      @else
      <a href="{{ route('login') }}" class="text-sm text-[#975519] hover:text-[#c87a2e]">Login</a>
      @endauth
    </div>
  </nav>

  <!-- Product Section -->
  <div class="max-w-5xl mx-auto py-24 px-4">
    <div class="grid md:grid-cols-2 gap-8 bg-white p-6 rounded-2xl shadow">
      <img 
        src="{{ asset('storage/' . $product->image) }}" 
        alt="{{ $product->name }}" 
        class="rounded-xl w-full object-cover"
      >
      <div>
        <h2 class="text-3xl font-bold mb-3">{{ $product->name }}</h2>
        <p class="text-lg text-[#5a5245] mb-4">₱{{ number_format($product->price, 2) }}</p>
        <p class="text-sm text-gray-600 mb-6">{{ $product->description }}</p>

        <!-- Buttons Section -->
        <div class="space-y-3">
          <!-- Add to Cart Form -->
          <form action="{{ route('user.cart.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button 
              type="submit" 
              class="bg-[#a58c63] text-white w-full px-6 py-3 rounded-xl hover:bg-[#8d7753] transition text-sm font-semibold shadow">
              Add to Cart
            </button>
          </form>

          <!-- Check Out Button -->
          <a 
            href="{{ route('user.cart.index') }}" 
            class="block text-center bg-[#975519] text-white w-full px-6 py-3 rounded-xl hover:bg-[#c87a2e] transition text-sm font-semibold shadow">
            Check Out
          </a>

          <!-- Back Button -->
          <a 
            href="{{ route('user.user_page') }}" 
            class="block text-center border border-[#a58c63] text-[#a58c63] w-full px-6 py-3 rounded-xl hover:bg-[#a58c63] hover:text-white transition text-sm font-semibold shadow">
            ← Back to Shop
          </a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
