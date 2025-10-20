@extends('seller.seller_dashboard')

@section('content')

    <div class="container-fluid">

        <!-- Dashboard Heading -->
        <h1 class="h3 mb-4 text-[#1b1b18] font-bold">Seller Dashboard</h1>

        <div class="row">

            <!-- Earnings (Monthly) -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow-lg h-100 py-2 rounded-2xl" style="border-left: 5px solid #975519;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-[#975519] text-uppercase mb-1">
                                    Earnings (Monthly)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    ${{ number_format($monthlyEarnings ?? 0, 0) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Orders Today -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow-lg h-100 py-2 rounded-2xl" style="border-left: 5px solid #e5ba91;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-[#975519] text-uppercase mb-1">
                                    Total Orders Today
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $totalOrdersToday ?? 0 }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Stock Products -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow-lg h-100 py-2 rounded-2xl" style="border-left: 5px solid #6b7280;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-[#975519] text-uppercase mb-1">
                                    Low Stock Products
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            {{ $lowStockCount ?? 0 }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-[#975519]" role="progressbar"
                                                style="width: 50%;" aria-valuenow="50"
                                                aria-valuemin="0" aria-valuemax="100"></div>
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

            <!-- New Customers -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow-lg h-100 py-2 rounded-2xl" style="border-left: 5px solid #3f3f3b;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-[#975519] text-uppercase mb-1">
                                    New Customers (Last 7 Days)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $newCustomersCount ?? 0 }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- End Row -->

    </div> <!-- End Container -->

@endsection
