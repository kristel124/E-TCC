@extends('seller.seller_dashboard')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    
    {{-- Page Header and Add Button --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <h2 class="text-3xl font-bold text-[#1b1b18] mb-4 sm:mb-0">
            <i class="fas fa-box-open mr-3" style="color: #975519;"></i>Products
        </h2>
        <a href="{{ route('seller.products.create') }}"
           class="inline-flex items-center px-6 py-2.5 rounded-xl text-white font-semibold transition shadow-md"
           style="background-color: #975519; hover-bg: #c87a2e;">
            <i class="fas fa-plus mr-2"></i> Add New Product
        </a>
    </div>

    {{----------------------}}

    {{-- Filter by Category & Search (Added search input for better UX) --}}
    <form method="GET" action="{{ route('seller.products.index') }}" class="mb-8 flex flex-col sm:flex-row items-stretch sm:items-center space-y-3 sm:space-y-0 sm:space-x-3 bg-[#fdfdfc] p-4 rounded-xl border border-[#e3e3e0]">
        
        <label for="search-input" class="text-[#6b6159] font-medium hidden sm:block">Search:</label>
        <input type="text" name="search" id="search-input" value="{{ request('search') }}" placeholder="Search by name..."
               class="flex-grow w-full sm:w-64 p-2.5 bg-white text-[#1b1b18]">

        <label for="category-select" class="text-[#6b6159] font-medium hidden sm:block">Category:</label>
        <select name="category" id="category-select" class="flex-grow w-full sm:w-auto p-2.5 bg-white text-[#1b1b18]">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        
        <button type="submit"
                class="px-5 py-2.5 rounded-xl text-white font-semibold transition flex-shrink-0"
                style="background-color: #975519; hover-bg: #c87a2e;">
            Apply Filter
        </button>
        
        @if(request()->filled('category') || request()->filled('search'))
            <a href="{{ route('seller.products.index') }}" class="px-5 py-2.5 rounded-xl bg-gray-100 text-[#1b1b18] font-medium hover:bg-gray-200 transition flex-shrink-0">
                Clear
            </a>
        @endif
    </form>
    
    {{----------------------}}
    
    {{-- Product Table --}}
    @if($products->count())
        <div class="overflow-x-auto rounded-xl border border-[#e3e3e0] shadow-lg bg-[#FDFDFC]">
            <table class="min-w-full border-collapse text-left text-[#1b1b18]">
                <thead class="bg-[#f5f3f0] border-b border-[#e3e3e0]">
                    <tr>
                        <th class="px-6 py-3 font-medium text-sm">Image</th>
                        <th class="px-6 py-3 font-medium text-sm">Product Name</th>
                        <th class="px-6 py-3 font-medium text-sm">Category</th>
                        <th class="px-6 py-3 font-medium text-sm">Price</th>
                        <th class="px-6 py-3 font-medium text-sm">Stock</th>
                        <th class="px-6 py-3 font-medium text-sm text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="border-t border-[#e3e3e0] hover:bg-[#f9f7f5] transition">
                            {{-- Image --}}
                            <td class="px-6 py-3">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                                         class="h-10 w-10 object-cover rounded-md border border-[#e3e3e0]">
                                @else
                                    <div class="h-10 w-10 bg-gray-200 rounded-md flex items-center justify-center text-xs text-gray-500">N/A</div>
                                @endif
                            </td>
                            
                            {{-- Name --}}
                            <td class="px-6 py-3 font-semibold">{{ $product->name }}</td>
                            
                            {{-- Category --}}
                            <td class="px-6 py-3 text-sm">{{ $product->category->name ?? 'Uncategorized' }}</td>
                            
                            {{-- Price --}}
                            <td class="px-6 py-3 font-medium text-[#975519]">₱{{ number_format($product->price, 2) }}</td>
                            
                            {{-- Stock --}}
                            <td class="px-6 py-3">
                                <span class="font-semibold {{ $product->stock < 10 ? 'text-red-500' : 'text-green-600' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            
                            {{-- Actions --}}
                            <td class="px-6 py-3 text-center whitespace-nowrap">
                                <a href="{{ route('seller.products.edit', $product->id) }}"
                                   class="text-[#1b1b18] hover:text-[#c87a2e] font-medium mr-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                
                                <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="inline ml-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Delete {{ $product->name }}? This is permanent.')"
                                            class="text-red-500 hover:text-red-700 font-medium">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $products->links() }}
        </div>

    @else
        <div class="text-center bg-[#FDFDFC] p-10 rounded-xl border border-[#e3e3e0] mt-10 shadow-sm">
            <i class="fas fa-box-open fa-3x mb-4 text-[#c6a77b]"></i>
            <p class="text-xl text-[#6b6159] font-medium">No products match your current filter or search criteria.</p>
            <a href="{{ route('seller.products.create') }}"
                class="mt-4 inline-block px-6 py-2.5 rounded-xl text-white font-semibold transition"
                style="background-color: #975519; hover-bg: #c87a2e;">
                Add Your First Product
            </a>
        </div>
    @endif
</div>
@endsection