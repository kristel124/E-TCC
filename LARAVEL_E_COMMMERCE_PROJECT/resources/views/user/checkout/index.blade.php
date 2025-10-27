<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout | LuxeBags</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f5f0] text-[#2e2b26] font-sans">
  <div class="container mx-auto px-6 py-16">
    <h2 class="text-3xl font-bold mb-6"> Checkout Summary</h2>

    @if(count($cart) > 0)
      <table class="w-full border-collapse bg-white rounded-lg shadow overflow-hidden mb-6">
        <thead>
          <tr class="bg-[#f4ede4] text-left">
            <th class="p-3">Product</th>
            <th class="p-3">Price</th>
            <th class="p-3">Quantity</th>
            <th class="p-3">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cart as $item)
            <tr class="border-b border-[#e3e3e0]">
              <td class="p-3">{{ $item['name'] }}</td>
              <td class="p-3">${{ number_format($item['price'], 2) }}</td>
              <td class="p-3">{{ $item['quantity'] }}</td>
              <td class="p-3">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <h3 class="text-xl font-semibold mb-4">Total: ${{ number_format($total, 2) }}</h3>

      <form action="#" method="POST" class="bg-white p-6 rounded-lg shadow">
        @csrf
        <h4 class="text-lg font-semibold mb-3">Shipping Information</h4>
        <input type="text" name="address" placeholder="Enter your shipping address"
               class="w-full border p-2 rounded mb-4" required>
        <button type="submit"
                class="bg-[#a58c63] text-white px-6 py-2 rounded hover:bg-[#8d7753]">Confirm Order</button>
      </form>
    @else
      <p class="text-gray-600">No items selected. 
        <a href="{{ route('user.user_page') }}" class="text-[#a58c63] underline">Back to Shop</a>.
      </p>
    @endif
  </div>
</body>
</html>
