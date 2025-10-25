<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart | LuxeBags</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f5f0] text-[#2e2b26] font-sans">

<div class="container mx-auto px-6 py-20">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold">Cart</h2>

    <!-- Back Button -->
    <a href="{{ route('user.user_page') }}" 
       class="bg-[#d9c8b4] text-[#2e2b26] px-4 py-2 rounded-lg shadow hover:bg-[#c8b69e] transition">
      ← Back to Shop
    </a>
  </div>

  @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
      {{ session('success') }}
    </div>
  @endif

  @if(count($cart) > 0)
    <div class="overflow-x-auto rounded-lg border border-[#e3e3e0] shadow bg-white">
      <table class="min-w-full border-collapse text-left text-[#1b1b18]">
        <thead class="bg-[#f4ede4]">
          <tr>
            <th class="p-3 text-center">✔</th>
            <th class="p-3">Product</th>
            <th class="p-3">Price</th>
            <th class="p-3">Quantity</th>
            <th class="p-3">Total</th>
            <th class="p-3 text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $grandTotal = 0; @endphp
          @foreach($cart as $id => $item)
            @php 
              $itemTotal = $item['price'] * $item['quantity']; 
              $grandTotal += $itemTotal; 
            @endphp
            <tr class="border-b border-[#e3e3e0] hover:bg-[#f9f7f5] transition">
              <!-- Checkbox for checkout -->
              <td class="p-3 text-center">
                <input type="checkbox" name="selected_items[]" value="{{ $id }}" form="checkoutForm"
                       class="w-5 h-5 accent-[#a58c63] cursor-pointer">
              </td>

              <td class="p-3 flex items-center">
                <img src="{{ $item['image'] }}" class="w-16 h-16 rounded-lg mr-3 object-cover">
                {{ $item['name'] }}
              </td>

              <td class="p-3">₱{{ number_format($item['price'], 2) }}</td>

              <!-- Quantity Update Form -->
              <td class="p-3">
                <form action="{{ route('user.cart.update') }}" method="POST" class="flex items-center gap-2">
                  @csrf
                  <input type="hidden" name="id" value="{{ $id }}">
                  <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                         class="w-16 border border-[#ccc] rounded px-2 py-1 text-center">
                  <button type="submit" class="bg-[#a58c63] text-white px-3 py-1 rounded hover:bg-[#8d7753]">
                    Update
                  </button>
                </form>
              </td>

              <td class="p-3">₱{{ number_format($itemTotal, 2) }}</td>

              <!-- Remove Button Form -->
              <td class="p-3 text-center flex justify-center gap-2">
                <form action="{{ route('user.cart.remove') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $id }}">
                  <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                    Remove
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{-- Checkout & Clear Cart --}}
    <div class="mt-6 flex justify-between items-center">
      <h3 class="text-xl font-semibold">Total: ₱{{ number_format($grandTotal, 2) }}</h3>

      <div class="flex gap-3">
        <!-- Clear Cart -->
        <form action="{{ route('user.cart.clear') }}" method="POST">
          @csrf
          <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
            Clear Cart
          </button>
        </form>

        <!-- Checkout Selected -->
        <form id="checkoutForm" action="{{ route('user.checkout.place') }}" method="POST">
          @csrf
          <button type="submit" class="bg-[#a58c63] text-white px-5 py-2 rounded-lg hover:bg-[#8d7753]">
            Checkout Selected
          </button>
        </form>
      </div>
    </div>

  @else
    <p class="text-gray-600 mt-6">Your cart is empty. 
      <a href="{{ route('user.user_page') }}" class="text-[#a58c63] underline">Continue shopping</a>.
    </p>
  @endif
</div>

</body>
</html>
