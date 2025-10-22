@extends('seller.seller_dashboard')

@section('content')
<div class="max-w-4xl mx-auto bg-[#FDFDFC] border border-[#e3e3e0] shadow-md rounded-2xl p-8">
    <h2 class="text-2xl font-semibold text-[#1b1b18] mb-6">👜 Add New Product</h2>

    <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Product Name --}}
        <div class="mb-5">
            <label class="block text-[#1b1b18] font-medium mb-2" for="name">Product Name</label>
            <input type="text" name="name" id="name" 
                   class="w-full rounded-xl border border-[#e3e3e0] p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]" 
                   placeholder="Enter product name" required>
        </div>

        {{-- Category --}}
        <div class="mb-5">
            <label class="block text-[#1b1b18] font-medium mb-2" for="category_id">Category</label>
            <select name="category_id" id="category_id"
                    class="w-full rounded-xl border border-[#e3e3e0] p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Price --}}
        <div class="mb-5">
            <label class="block text-[#1b1b18] font-medium mb-2" for="price">Price</label>
            <input type="number" name="price" id="price" step="0.01" min="0"
                   class="w-full rounded-xl border border-[#e3e3e0] p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]" 
                   placeholder="₱0.00" required>
        </div>

        {{-- Stock --}}
        <div class="mb-5">
            <label class="block text-[#1b1b18] font-medium mb-2" for="stock">Stock</label>
            <input type="number" name="stock" id="stock" min="0"
                   class="w-full rounded-xl border border-[#e3e3e0] p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]" 
                   placeholder="Enter available stock" required>
        </div>

        {{-- Description --}}
        <div class="mb-5">
            <label class="block text-[#1b1b18] font-medium mb-2" for="description">Description</label>
            <textarea name="description" id="description" rows="5"
                      class="w-full rounded-xl border border-[#e3e3e0] p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]"
                      placeholder="Describe your product..."></textarea>
        </div>

        {{-- Image Upload --}}
        <div class="mb-6">
            <label class="block text-[#1b1b18] font-medium mb-2" for="image">Product Image</label>
            <input type="file" name="image" id="image"
                   class="w-full rounded-xl border border-[#e3e3e0] bg-white p-3 focus:border-[#FFC89C] focus:ring-[#FFC89C]" accept="image/*" required>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end space-x-3">
            <a href="{{ route('seller.products.index') }}"
               class="px-5 py-2.5 rounded-xl border border-[#e3e3e0] text-[#1b1b18] hover:bg-[#f5f3f0]">Cancel</a>
            <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-[#FFC89C] text-[#1b1b18] font-medium hover:bg-[#ffb97c] transition">
                Save Product
            </button>
        </div>
    </form>
</div>
@endsection
