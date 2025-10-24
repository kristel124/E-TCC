<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome | LuxeBags</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f5f0] text-[#2e2b26] font-sans">

  <!-- Navbar -->
  <nav class="fixed top-0 left-0 w-full z-50 flex items-center justify-between px-8 py-4 bg-[#f4ede4]/95 backdrop-blur-md shadow-md transition">
    <h1 class="text-2xl font-bold tracking-wide text-[#6b6159] mr-6">TC<span class="text-[#a58c63]">C</span></h1>

    <div class="flex items-center gap-4 lg:ml-6">
      <!-- Search -->
      <form action="#" method="GET" class="flex">
        <input type="text" name="query" placeholder="Search products..."
          class="px-3 py-2 text-sm rounded-l-lg border border-[#e3e3e0] bg-[#fffaf5] text-[#1b1b18] focus:border-[#c6a77b] focus:ring-1 focus:ring-[#e3c292] outline-none w-64">
        <button type="submit" class="bg-[#975519] text-white px-4 py-2 rounded-r-lg hover:bg-[#c87a2e] transition text-sm">
          Search
        </button>
      </form>

      <!-- Cart -->
      <ul class="nav-item flex items-center">
        <a href="#" class="nav-link text-[#6b6159] hover:text-[#c87a2e] flex items-center">
          <img src="{{ asset('images/icons8-cart-24.png') }}" alt="Cart" class="w-6 h-6 object-contain hover:scale-110 transition-transform">
        </a>
      </ul>

      <!-- User -->
      <ul class="flex items-center gap-4 text-base font-medium">
        @auth
          <li class="text-[#6b6159] hidden sm:block">Welcome, {{ Auth::user()->name }}!</li>
        @endauth
      </ul>
    </div>
  </nav>

  <!-- Featured Products -->
  <section id="shop" class="px-10 md:px-20 py-24 bg-[#f4ede4] mt-16">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
      <div>
        <h3 class="text-3xl font-bold text-left mb-2">Bags That Speak Your Style</h3>
        <p class="text-[#5a5245] text-base">Because your carry should be as bold as you are.</p>
      </div>

      <!-- Filter/Sort Dropdown -->
      <form method="GET" class="mt-4 md:mt-0">
        <label for="sort" class="text-sm text-[#5a5245] mr-2 font-medium">Sort by:</label>
        <select id="sort" name="sort" class="border border-[#d6ccc2] bg-white text-[#3b342e] text-sm rounded-lg px-3 py-2 focus:ring-[#c6a77b] focus:border-[#c6a77b]">
          <option value="latest">Latest</option>
          <option value="price_low_high">Price: Low to High</option>
          <option value="price_high_low">Price: High to Low</option>
        </select>
      </form>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
      @foreach ([
        ['name' => 'Classic Leather Tote', 'price' => '$89.99', 'image' => 'images/Screenshot 2025-10-22 014139.png'],
        ['name' => 'Minimalist Crossbody', 'price' => '$74.99', 'image' => 'images/Screenshot 2025-10-22 014433.png'],
        ['name' => 'Chic Handbag', 'price' => '$99.99', 'image' => 'images/tote-bags-fall-2022-back-to-work-habituallychic-004.jpeg'],
        ['name' => 'Everyday Tote', 'price' => '$64.99', 'image' => 'images/3bags.png'],
        ['name' => 'Premium Shoulder Bag', 'price' => '$119.99', 'image' => 'images/shoulderbag.png'],
        ['name' => 'Elegant Clutch', 'price' => '$59.99', 'image' => 'images/clutch.png'],
        ['name' => 'Travel Duffel', 'price' => '$129.99', 'image' => 'images/duffel.png'],
        ['name' => 'Casual Sling Bag', 'price' => '$54.99', 'image' => 'images/sling.png']
      ] as $product)
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition flex flex-col">
          <div class="p-5 flex-grow">
            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="rounded-xl w-full h-64 object-cover mb-4">
          </div>
          <div class="p-5 border-t border-[#eee] mt-auto">
            <h4 class="font-semibold text-lg">{{ $product['name'] }}</h4>
            <p class="text-[#5a5245] mt-1 mb-3">{{ $product['price'] }}</p>
            <button class="w-full bg-[#a58c63] text-white px-4 py-2 rounded-xl hover:bg-[#8d7753] transition">Add to Cart</button>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  @include('components.footer')
</body>
</html>
