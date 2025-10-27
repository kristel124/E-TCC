<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome | TCC</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f5f0] text-[#2e2b26] font-sans">

  <!-- Navbar -->
  <nav class="fixed top-0 left-0 w-full z-50 flex items-center justify-between px-8 py-4 bg-[#f4ede4]/95 backdrop-blur-md shadow-md transition">
    <h1 class="text-2xl font-bold tracking-wide">TC<span class="text-[#a58c63]">C</span></h1>
    <ul class="flex gap-8 text-sm font-medium">
      <li><a href="#" class="hover:text-[#a58c63] transition">Home</a></li>
      <li><a href="#" class="hover:text-[#a58c63] transition">Shop</a></li>
      <li><a href="#" class="hover:text-[#a58c63] transition">About</a></li>
      <li><a href="#" class="hover:text-[#a58c63] transition">Contact</a></li>
    </ul>
    @if (Route::has('login'))
      <nav class="flex items-center justify-end gap-4">
        @auth
          <a href="{{ url('/dashboard') }}" class="bg-[#a58c63] text-white px-4 py-2 rounded-xl hover:bg-[#8d7753] transition">
            Dashboard
          </a>
        @else
          <a href="{{ route('login') }}" class="bg-[#a58c63] text-white px-4 py-2 rounded-xl hover:bg-[#8d7753] transition">
            Log in
          </a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="bg-[#a58c63] text-white px-4 py-2 rounded-xl hover:bg-[#8d7753] transition">
              Register
            </a>
          @endif
        @endauth
      </nav>
    @endif
  </nav>

  <!-- Hero Section -->
  <section class="flex flex-col md:flex-row items-center justify-between px-10 md:px-20 py-20">
    <div class="md:w-1/2 space-y-6">
      <h2 class="text-4xl md:text-5xl font-bold leading-tight">
        What Will You <span class="text-[#a58c63]">Carry Next?</span><br />
      </h2>
      <h2 class="text-2xl md:text-2xl font-bold leading-tight">
        Discover Your Signature Style
      </h2>
      <p class="text-lg text-[#5a5245]">
        Explore luxury bags—designed essentials that combine elevated style with everyday function.
      </p>
      <a href="{{ route('register') }}" class="inline-block bg-[#a58c63] text-white px-6 py-3 rounded-xl font-medium hover:bg-[#8d7753] transition">
        Shop Now
      </a>
    </div>

    <div class="md:w-1/2 mt-10 md:mt-0">
      <img src="{{ asset('images/3bags.png') }}" alt="Luxury bag" class="">
    </div>
  </section>

  <!-- Featured Products Section 1 -->
  <section id="shop" class="px-10 md:px-20 py-14 bg-[#f4ede4]">
    <h3 class="text-3xl font-bold text-center mb-10">Featured Bags</h3>
    <div class="grid md:grid-cols-4 gap-8">
      
      <!-- Bag 1 -->
      <div class="ixed bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
        <img src="{{ asset('images/Screenshot 2025-10-22 014139.png') }}" alt="Bag 1" class="rounded-xl mb-4">
        <h4 class="font-semibold text-lg">Classic Leather Tote</h4>
        <p class="text-[#5a5245] mt-1 mb-3">₱89.99</p>
        <div class="flex flex-col md:flex-row gap-3">
          <button class="bg-[#a58c63] text-white px-4 py-2 rounded-xl hover:bg-[#8d7753] transition w-full md:w-auto">Add to Cart</button>
          <a href="#" class="border border-[#a58c63] text-[#a58c63] px-4 py-2 rounded-xl hover:bg-[#a58c63] hover:text-white transition w-full md:w-auto text-center">View Details</a>
        </div>
      </div>

      <!-- Bag 2 -->
      <div class="ixed bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
        <img src="{{ asset('images/Screenshot 2025-10-22 014433.png') }}" alt="Bag 2" class="rounded-xl mb-4">
        <h4 class="font-semibold text-lg">Minimalist Crossbody</h4>
        <p class="text-[#5a5245] mt-1 mb-3">₱74.99</p>
        <div class="flex flex-col md:flex-row gap-3">
          <button class="bg-[#a58c63] text-white px-4 py-2 rounded-xl hover:bg-[#8d7753] transition w-full md:w-auto">Add to Cart</button>
          <a href="#" class="border border-[#a58c63] text-[#a58c63] px-4 py-2 rounded-xl hover:bg-[#a58c63] hover:text-white transition w-full md:w-auto text-center">View Details</a>
        </div>
      </div>

      <!-- Bag 3 -->
      <div class="ixed bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
        <img src="{{ asset('images/tote-bags-fall-2022-back-to-work-habituallychic-004.jpeg') }}" alt="Bag 3" class="rounded-xl mb-4">
        <h4 class="font-semibold text-lg">Chic Handbag</h4>
        <p class="text-[#5a5245] mt-1 mb-3">₱99.99</p>
        <div class="flex flex-col md:flex-row gap-3">
          <button class="bg-[#a58c63] text-white px-4 py-2 rounded-xl hover:bg-[#8d7753] transition w-full md:w-auto">Add to Cart</button>
          <a href="#" class="border border-[#a58c63] text-[#a58c63] px-4 py-2 rounded-xl hover:bg-[#a58c63] hover:text-white transition w-full md:w-auto text-center">View Details</a>
        </div>
      </div>

      <!-- Bag 4 -->
      <div class="ixed bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
        <img src="#" alt="Bag 4" class="rounded-xl mb-4">
        <h4 class="font-semibold text-lg">Elegant Shoulder Bag</h4>
        <p class="text-[#5a5245] mt-1 mb-3">₱109.99</p>
        <div class="flex flex-col md:flex-row gap-3">
          <button class="bg-[#a58c63] text-white px-4 py-2 rounded-xl hover:bg-[#8d7753] transition w-full md:w-auto">Add to Cart</button>
          <a href="#" class="border border-[#a58c63] text-[#a58c63] px-4 py-2 rounded-xl hover:bg-[#a58c63] hover:text-white transition w-full md:w-auto text-center">View Details</a>
        </div>
      </div>

    </div>
  </section>

  @include('components.footer')

</body>
</html>
