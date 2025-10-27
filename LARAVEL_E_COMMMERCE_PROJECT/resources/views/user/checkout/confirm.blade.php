<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmed</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f5f0] text-[#2e2b26] font-sans">

<div class="container mx-auto px-6 py-12 text-center">
    <h1 class="text-3xl font-bold mb-6 text-green-700">Order Confirmed!</h1>
    <p class="mb-6">Thank you, <strong>{{ $shipping['name'] ?? 'Customer' }}</strong>!  
       Your order has been successfully placed and will be delivered to:</p>

    <div class="bg-white p-6 rounded-2xl shadow-md w-full md:w-1/2 mx-auto mb-8">
        <p><strong>Address:</strong> {{ $shipping['address'] ?? 'N/A' }}</p>
        <p><strong>Phone:</strong> {{ $shipping['phone'] ?? 'N/A' }}</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-md w-full md:w-3/4 mx-auto">
        <h2 class="text-xl font-semibold mb-4">Your Ordered Items</h2>
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
                @php $grandTotal = 0; @endphp
                @foreach ($selected_items as $item)
                    @php 
                        $total = ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
                        $grandTotal += $total;
                    @endphp
                    <tr>
                        <td class="border p-3">{{ $item['name'] ?? 'Item' }}</td>
                        <td class="border p-3">{{ $item['quantity'] ?? 1 }}</td>
                        <td class="border p-3">₱{{ number_format($item['price'] ?? 0, 2) }}</td>
                        <td class="border p-3">₱{{ number_format($total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right font-bold text-lg mt-4">
            Total: ₱{{ number_format($grandTotal, 2) }}
        </div>
    </div>

    <a href="{{ route('user.user_page') }}" class="inline-block mt-8 bg-[#a58c63] text-white px-6 py-3 rounded-lg hover:bg-[#8d7753] transition">
        Back to Shop
    </a>
</div>

</body>
</html>
