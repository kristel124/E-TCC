@extends('seller.seller_dashboard')

@section('content')
<div class="max-w-4xl mx-auto bg-[#FDFDFC] border border-[#e3e3e0] shadow-md rounded-2xl p-8">
    <h2 class="text-2xl font-semibold text-[#1b1b18] mb-6">✏️ Edit Product</h2>

    <form action="{{ route('seller.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Product Name --}}
        <div class="mb-5">
            <label class="block text-[#1b1b18] font-medium mb-2">Product Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                   class="w-full rounded-xl border border-[#e3e3e0] p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]" required>
        </div>

        {{-- Category --}}
        <div class="mb-5">
            <label class="block text-[#1b1b18] font-medium mb-2">Category</label>
            <select name="category_id"
                    class="w-full rounded-xl border border-[#e3e3e0] p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Price --}}
        <div class="mb-5">
            <label class="block text-[#1b1b18] font-medium mb-2">Price</label>
            <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}"
                   class="w-full rounded-xl border border-[#e3e3e0] p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]" required>
        </div>

        {{-- Stock --}}
        <div class="mb-5">
            <label class="block text-[#1b1b18] font-medium mb-2">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                   class="w-full rounded-xl border border-[#e3e3e0] p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]" required>
        </div>

        {{-- Description --}}
        <div class="mb-5">
            <label class="block text-[#1b1b18] font-medium mb-2">Description</label>
            <textarea name="description" rows="5"
                      class="w-full rounded-xl border border-[#e3e3e0] p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Existing Image --}}
        @if ($product->image)
            <div class="mb-5">
                <p class="text-sm text-[#6b7280] mb-2">Current Image:</p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-24 rounded-lg">
            </div>
        @endif

        {{-- Upload New Image --}}
        <div class="mb-6">
            <label class="block text-[#1b1b18] font-medium mb-2">Change Image</label>
            <input type="file" name="image"
                   class="w-full rounded-xl border border-[#e3e3e0] bg-white p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]" accept="image/*">
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end space-x-3">
            <a href="{{ route('seller.products.index') }}"
               class="px-5 py-2.5 rounded-xl border border-[#e3e3e0] text-[#1b1b18] hover:bg-[#f5f3f0]">Cancel</a>
            <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-[#FFC89C] text-[#1b1b18] font-medium hover:bg-[#ffb97c] transition">
                Update Product
            </button>
        </div>
    </form>
</div>
@endsection
