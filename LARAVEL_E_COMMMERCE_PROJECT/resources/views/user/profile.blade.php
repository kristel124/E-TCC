<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f5f0] text-[#2e2b26] font-sans">
    <div class="container mx-auto px-6 py-24 min-h-screen">

        <h2 class="text-3xl font-bold mb-6 text-[#5a5245]">My Profile</h2>

        <!-- User Info -->
        <div class="bg-[#fdf6ec] rounded-2xl shadow-md p-6 mb-10">
            <h3 class="text-xl font-semibold mb-4 text-[#5a5245]">Personal Information</h3>
            <ul class="text-[#7a6b5a] space-y-2">
                <li><strong>Name:</strong> {{ auth()->user()->name }}</li>
                <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
                <li><strong>Phone:</strong> {{ auth()->user()->phone ?? 'N/A' }}</li>
                <li><strong>Gender:</strong> 
                    {{ auth()->user()->gender == 'Male' ? 'Male' : (auth()->user()->gender == 'Female' ? 'Female' : 'N/A') }}
                </li>
                <li><strong>Birthday:</strong> 
                    {{ auth()->user()->birthday ? \Carbon\Carbon::parse(auth()->user()->birthday)->format('M d, Y') : 'N/A' }}
                </li>
            </ul>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-4 mt-6">
                <!-- Update Profile -->
                <a href="#" class="bg-[#8b5e3c] text-white px-4 py-2 rounded-lg hover:bg-[#b79572] transition text-sm">
                    Update Profile
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button 
                        type="submit" 
                        class="bg-[#975519] text-white px-4 py-2 rounded-lg hover:bg-[#c87a2e] transition text-sm">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Orders -->
        <div class="bg-[#fdf6ec] rounded-2xl shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4 text-[#5a5245]">My Orders</h3>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#e5dfd3] bg-[#f2ede5]">
                        <th class="py-2 px-4 text-[#5a5245]">Order #</th>
                        <th class="py-2 px-4 text-[#5a5245]">Status</th>
                        <th class="py-2 px-4 text-[#5a5245]">Items</th>
                        <th class="py-2 px-4 text-[#5a5245]">Total</th>
                        <th class="py-2 px-4 text-[#5a5245]">Date</th>
                        <th class="py-2 px-4 text-[#5a5245]">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="border-b border-[#e5dfd3] hover:bg-[#f3eee5] transition">
                            <td class="py-2 px-4">
                                <a href="{{ route('user.orders.show', $order->id) }}" class="text-[#8b5e3c] hover:underline font-medium">
                                    #{{ $order->id }}
                                </a>
                            </td>
                            <td class="py-2 px-4">
                                @if($order->status == 'pending')
                                    <span class="bg-[#fff3d6] text-[#b07c2c] px-2 py-1 rounded-full text-sm">Pending</span>
                                @elseif($order->status == 'completed')
                                    <span class="bg-[#e6f0e6] text-[#3d7c3d] px-2 py-1 rounded-full text-sm">Completed</span>
                                @elseif($order->status == 'canceled')
                                    <span class="bg-[#fbeaea] text-[#a63939] px-2 py-1 rounded-full text-sm">Canceled</span>
                                @else
                                    <span class="bg-[#f5f0eb] text-[#7a6b5a] px-2 py-1 rounded-full text-sm">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td class="py-2 px-4">{{ $order->items_count ?? $order->items->sum('quantity') ?? 'N/A' }}</td>
                            <td class="py-2 px-4">₱{{ number_format($order->total, 2) }}</td>
                            <td class="py-2 px-4">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('user.orders.show', $order->id) }}" class="bg-[#d4b897] text-white px-4 py-1 rounded-lg hover:bg-[#b79572] transition">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 px-4 text-center text-[#7a6b5a]">No orders yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>
