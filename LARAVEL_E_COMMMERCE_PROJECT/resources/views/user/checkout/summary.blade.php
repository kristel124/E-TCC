<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Summary</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f5f0] text-[#2e2b26] font-sans">

<div class="container mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold mb-6">Order Summary</h1>

    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-xl font-semibold mb-4">Shipping Information</h2>
        <p><strong>Name:</strong> {{ $shipping['name'] ?? 'N/A' }}</p>
        <p><strong>Phone:</strong> {{ $shipping['phone'] ?? 'N/A' }}</p>
        <p><strong>Address:</strong> {{ $shipping['address'] ?? 'N/A' }}</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-md mt-6">
        <h2 class="text-xl font-semibold mb-4">Items Summary</h2>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-3 text-left">Product</th>
                    <th class="border p-3 text-left">Quantity</th>
                    <th class="border p-3 text-left">Price</th>
                    <th class="border p-3 text-left">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($selected_items as $item)
                    <tr>
                        <td class="border p-3">{{ $item['name'] ?? 'Item' }}</td>
                        <td class="border p-3">{{ $item['quantity'] ?? 1 }}</td>
                        <td class="border p-3">₱{{ number_format($item['price'] ?? 0, 2) }}</td>
                        <td class="border p-3">₱{{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 2) }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center p-3">No items selected.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex justify-end mt-6">
        <a href="{{ route('user.cart.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
            Cancel
        </a>
        <form action="{{ route('user.checkout.confirm') }}" method="POST">
            @csrf
            <input type="hidden" name="shipping" value="{{ json_encode($shipping) }}">
            <input type="hidden" name="selected_items" value="{{ json_encode($selected_items) }}">
            <button type="submit" class="bg-[#8b5e3c] text-white px-6 py-2 rounded-lg hover:bg-[#714a30] transition">
                Confirm Order
            </button>
        </form>
    </div>
</div>

</body>
</html>
