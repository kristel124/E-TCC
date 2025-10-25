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
      @endauth
    </div>
  </nav>

  <!-- Shop Section -->
  <section id="shop" class="px-8 md:px-20 py-24 mt-24 bg-[#f4ede4]">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
      <div>
        <h3 class="text-3xl font-bold mb-2">Bags That Speak Your Style</h3>
        <p class="text-[#5a5245] text-base">Because your carry should be as bold as you are.</p>
      </div>

      <!-- Sorting -->
      <form method="GET" class="mt-4 md:mt-0">
        <label for="sort" class="text-sm text-[#5a5245] mr-2 font-medium">Sort by:</label>
        <select id="sort" name="sort" onchange="this.form.submit()"
          class="border border-[#d6ccc2] bg-white text-[#3b342e] text-sm rounded-lg px-3 py-2 focus:ring-[#c6a77b] focus:border-[#c6a77b]">
          <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Latest</option>
          <option value="price_low_high" {{ request('sort') === 'price_low_high' ? 'selected' : '' }}>Price: Low to High</option>
          <option value="price_high_low" {{ request('sort') === 'price_high_low' ? 'selected' : '' }}>Price: High to Low</option>
        </select>
      </form>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
      @forelse ($products as $product)
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition flex flex-col">
          <div class="p-5">
            @if($product->image)
              <img src="{{ asset('storage/' . $product->image) }}" 
                   alt="{{ $product->name }}" 
                   class="rounded-xl w-full h-64 object-cover">
            @else
              <img src="{{ asset('images/placeholder-bag.png') }}" 
                   alt="No image" 
                   class="rounded-xl w-full h-64 object-cover opacity-60">
            @endif
          </div>

          <div class="p-5 border-t border-[#eee] flex flex-col gap-3">
            <h4 class="font-semibold text-lg truncate w-full">{{ $product->name }}</h4>
            <p class="text-[#5a5245]">₱{{ number_format($product->price, 2) }}</p>

            <!-- View Details Button -->
            <a href="#" 
               class="w-full text-center bg-[#c87a2e] text-white py-2 rounded-xl hover:bg-[#a55d1e] transition text-sm">
              View Details
            </a>

            <!-- Add to Cart Button -->
            <form action="{{ route('user.cart.add') }}" method="POST" class="w-full">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <button 
                type="submit" 
                class="w-full bg-[#a58c63] text-white px-4 py-2 rounded-xl hover:bg-[#8d7753] transition text-sm">
                Add to Cart
              </button>
            </form>
          </div>
        </div>
      @empty
        <p class="text-[#5a5245] col-span-full">No products available yet.</p>
      @endforelse
    </div>
  </section>

  @include('components.footer')

</body>
</html>
