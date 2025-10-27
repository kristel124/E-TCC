<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Shipping</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f5f0] text-[#2e2b26] font-sans">

<div class="container mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold mb-6">Shipping Information</h1>

    <form action="{{ route('user.checkout.summary') }}" method="POST" class="bg-white p-6 rounded-2xl shadow-md">
        @csrf
        <input type="hidden" name="selected_items" value="{{ implode(',', $selected_items) }}">

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Full Name</label>
            <input type="text" name="name" class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Phone Number</label>
            <input type="text" name="phone" class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Address</label>
            <textarea name="address" class="w-full border rounded-lg p-2" rows="3" required></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-[#8b5e3c] text-white px-6 py-2 rounded-lg hover:bg-[#714a30] transition">
                Continue to Order Summary
            </button>
        </div>
    </form>
</div>

</body>
</html>
