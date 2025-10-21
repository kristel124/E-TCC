@extends('seeller.seller_dashboard')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard Overview 🚀</h1>

    <div class="row">
        {{-- 1. Earnings (Monthly) Card --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                            {{-- Placeholder for actual data --}}
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($monthlyEarnings ?? 0, 0) }}</div> 
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. Total Orders Card --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Orders Today</div>
                            {{-- Placeholder for actual data --}}
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOrdersToday ?? 0 }}</div> 
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- 3. Inventory (Progress) Card --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Low Stock Products</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    {{-- Placeholder for actual data --}}
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $lowStockCount ?? 0 }}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        {{-- Progress Bar data placeholder --}}
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- 4. New Customers Card (Completed) --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">New Customers (Last 7 Days)</div>
                            {{-- Placeholder for actual data --}}
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $newCustomersCount ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div> 
    {{-- Close the main row div --}}

@endsection