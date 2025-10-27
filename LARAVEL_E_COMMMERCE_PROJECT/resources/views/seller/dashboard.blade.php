@extends('seller.seller_dashboard')

@section('content')
<body class="bg-[#f5f0e6] min-h-screen font-sans">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Seller Dashboard</h1>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow text-center">
                <h2 class="text-gray-500 font-semibold">Monthly Earnings</h2>
                <p class="text-2xl font-bold mt-2">0</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow text-center">
                <h2 class="text-gray-500 font-semibold">Orders Today</h2>
                <p class="text-2xl font-bold mt-2">0</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow text-center">
                <h2 class="text-gray-500 font-semibold">New Customers</h2>
                <p class="text-2xl font-bold mt-2">0</p>
            </div>
        </div>

        <!-- Low Stock Products -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Low Stock Products ({{ $lowStockCount }})</h2>
            @if($lowStockProducts->count() < 5)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($lowStockProducts as $product)
                <div class="bg-white rounded-2xl shadow p-4 flex items-center space-x-4">
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/50' }}" 
                         alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded">
                    <div>
                        <p class="font-semibold">{{ $product->name }}</p>
                        <p class="text-gray-500 text-sm">Stock: {{ $product->stock }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
                <p class="text-gray-500">No low-stock products.</p>
            @endif
        </div>

        <!-- Recent Activities -->
        <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Recent Activities</h2>
            <ul class="bg-white rounded-2xl shadow divide-y divide-gray-200">
                @foreach($recentActivities as $activity)
                <li class="p-4 flex justify-between items-center">
                    <div>
                        <p class="font-medium">{{ ucfirst($activity['type']) }}</p>
                        <p class="text-gray-500 text-sm">{{ $activity['description'] }}</p>
                    </div>
                    <span class="text-gray-400 text-sm">{{ $activity['time'] }}</span>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
@endsection
