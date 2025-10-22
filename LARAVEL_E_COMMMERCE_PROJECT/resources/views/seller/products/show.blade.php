@extends('seller.seller_dashboard')

@section('content')
<div class="min-h-screen bg-[#f3e3d5]/30 flex flex-col items-center py-10 px-6">
    {{-- Page Container --}}
    <div class="w-full max-w-4xl bg-[#FDFDFC] rounded-2xl shadow-lg border border-[#e3e3e0] overflow-hidden">

        {{-- Product Image --}}
        <div class="w-full h-80 bg-[#f3e3d5]/40 flex items-center justify-center">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="object-contain h-full w-auto rounded-md">
            @else
                <div class="text-[#6b5f4b] italic">No image available</div>
            @endif
        </div>

        {{-- Product Details --}}
        <div class="p-8">
            <div class="flex items-start justify-between mb-6">
                <h1 class="text-3xl font-bold text-[#1b1b18]">{{ $product->name }}</h1>
                <span class="text-2xl font-semibold text-[#975519]">${{ number_format($product->price, 2) }}</span>
            </div>

            <p class="text-[#6b7280] mb-6 leading-relaxed">
                {{ $product->description ?? 'No description provided for this product.' }}
            </p>

            {{-- Category & Stock Info --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                <div>
                    <p class="text-sm text-[#6b7280] uppercase font-semibold mb-1">Category</p>
                    <p class="text-[#1b1b18]">{{ $product->category->name ?? 'Uncategorized' }}</p>
                </div>
                <div>
                    <p class="text-sm text-[#6b7280] uppercase font-semibold mb-1">Stock</p>
                    <p class="text-[#1b1b18]">{{ $product->stock }} pcs available</p>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-between border-t border-[#e3e3e0] pt-6">
                <a href="{{ route('seller.products.index') }}" 
                   class="inline-flex items-center text-[#1b1b18] hover:text-[#975519] transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Products
                </a>

                <div class="space-x-3">
                    <a href="{{ route('seller.products.edit', $product->id) }}" 
                       class="bg-[#f3e3d5] hover:bg-[#f0d4bc] text-[#1b1b18] font-medium py-2 px-4 rounded-xl border border-[#e3e3e0] transition">
                        Edit Product
                    </a>

                    <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this product?')"
                                class="bg-[#e3c6b3] hover:bg-[#d6b39f] text-[#1b1b18] font-medium py-2 px-4 rounded-xl border border-[#e3e3e0] transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
