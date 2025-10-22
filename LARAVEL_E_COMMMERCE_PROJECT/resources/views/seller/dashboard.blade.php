@extends('seller.seller_dashboard')

@section('content')
<div class="space-y-8 bg-[#f8f5f2] min-h-screen p-6 rounded-xl">

    {{-- Header --}}
    <div class="flex items-center justify-between border-b border-[#e3e3e0] pb-4">
        <h1 class="text-3xl font-semibold text-[#5c4a3d]">
            Welcome, {{ Auth::user()->name ?? 'Seller' }}!
        </h1>
    </div>

    {{-- Stats Cards Section --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- Earnings (Monthly) --}}
        <div class="bg-[#FDFDFC] border border-[#e3e3e0] rounded-2xl shadow-md p-5 hover:shadow-lg transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-[#8b6b4f] font-medium uppercase">Earnings (Monthly)</p>
                    <h2 class="text-3xl font-semibold text-[#3f2f27] mt-2">
                        ${{ number_format($monthlyEarnings ?? 0, 0) }}
                    </h2>
                </div>
                <div class="bg-[#f3e3d5] p-3 rounded-xl">
                    <i class="fas fa-calendar text-[#8b6b4f] fa-lg"></i>
                </div>
            </div>
        </div>

        {{-- Total Orders --}}
        <div class="bg-[#FDFDFC] border border-[#e3e3e0] rounded-2xl shadow-md p-5 hover:shadow-lg transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-[#8b6b4f] font-medium uppercase">Total Orders Today</p>
                    <h2 class="text-3xl font-semibold text-[#3f2f27] mt-2">
                        {{ $totalOrdersToday ?? 0 }}
                    </h2>
                </div>
                <div class="bg-[#f3e3d5] p-3 rounded-xl">
                    <i class="fas fa-shopping-cart text-[#8b6b4f] fa-lg"></i>
                </div>
            </div>
        </div>

        {{-- Low Stock Products --}}
        <div class="bg-[#FDFDFC] border border-[#e3e3e0] rounded-2xl shadow-md p-5 hover:shadow-lg transition">
            <div class="flex justify-between items-center">
                <div class="w-full">
                    <p class="text-sm text-[#8b6b4f] font-medium uppercase">Low Stock Products</p>
                    <div class="flex items-center justify-between mt-2">
                        <h2 class="text-3xl font-semibold text-[#3f2f27]">{{ $lowStockCount ?? 0 }}</h2>
                        <div class="w-1/2 bg-[#e8e4e1] h-2 rounded-full ml-3">
                            <div class="bg-[#c7a589] h-2 rounded-full" style="width: 50%"></div>
                        </div>
                    </div>
                </div>
                <div class="ml-4 bg-[#f3e3d5] p-3 rounded-xl">
                    <i class="fas fa-warehouse text-[#8b6b4f] fa-lg"></i>
                </div>
            </div>
        </div>

        {{-- New Customers --}}
        <div class="bg-[#FDFDFC] border border-[#e3e3e0] rounded-2xl shadow-md p-5 hover:shadow-lg transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-[#8b6b4f] font-medium uppercase">New Customers (Last 7 Days)</p>
                    <h2 class="text-3xl font-semibold text-[#3f2f27] mt-2">
                        {{ $newCustomersCount ?? 0 }}
                    </h2>
                </div>
                <div class="bg-[#f3e3d5] p-3 rounded-xl">
                    <i class="fas fa-user-plus text-[#8b6b4f] fa-lg"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- Recent Activity Section --}}
    <div class="mt-10">
        <div class="bg-[#FDFDFC] border border-[#e3e3e0] rounded-2xl shadow-lg overflow-hidden">
            <div class="p-5 border-b border-[#e3e3e0] flex items-center justify-between">
                <h2 class="text-xl font-semibold text-[#5c4a3d] flex items-center">
                    <i class="fas fa-history mr-2 text-[#8b6b4f]"></i> 
                    Recent Activity
                </h2>
            </div>

            <div class="divide-y divide-[#f0ece8]">
                @forelse ($recentActivities ?? [] as $activity)
                    <div class="flex items-start p-4 hover:bg-[#f9f7f5] transition duration-150">
                        <div class="p-2 mr-3 rounded-full 
                            @if ($activity['type'] == 'order') bg-[#e8f5e9] text-[#4a6b4f] 
                            @elseif ($activity['type'] == 'product') bg-[#e3efff] text-[#3b5b9a]
                            @elseif ($activity['type'] == 'review') bg-[#fff4e3] text-[#8b6b4f]
                            @elseif ($activity['type'] == 'update') bg-[#e8f0f8] text-[#58708b]
                            @else bg-[#f3e3d5] text-[#5c4a3d] @endif
                        ">
                            <i class="fas 
                                @if ($activity['type'] == 'order') fa-box-open
                                @elseif ($activity['type'] == 'product') fa-plus
                                @elseif ($activity['type'] == 'review') fa-star
                                @elseif ($activity['type'] == 'update') fa-pen
                                @else fa-info-circle @endif
                                w-5 h-5"></i>
                        </div>

                        <div class="flex-grow">
                            <p class="text-[#3f2f27] font-medium">{{ $activity['description'] ?? 'Activity performed.' }}</p>
                            <p class="text-sm text-[#8b6b4f] mt-1">
                                {{ $activity['time'] ?? 'Just now' }} 
                                @if (isset($activity['link']))
                                    - <a href="{{ $activity['link'] }}" class="text-[#b37c54] hover:text-[#9e6e48] font-medium">View Details</a>
                                @endif
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="p-5 text-center text-[#8b6b4f]">No recent activity to display.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection
