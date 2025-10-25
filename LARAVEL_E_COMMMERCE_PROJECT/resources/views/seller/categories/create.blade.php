@extends('seller.seller_dashboard')

@section('content')
<div class="max-w-3xl mx-auto bg-[#FDFDFC] border border-[#e3e3e0] shadow-md rounded-2xl p-8">
    <h2 class="text-2xl font-semibold text-[#1b1b18] mb-6"> + Add New Category</h2>

    <form action="{{ route('seller.categories.store') }}" method="POST">
        @csrf

        {{-- Category Name --}}
        <div class="mb-5">
            <label class="block text-[#1b1b18] font-medium mb-2" for="name">Category Name</label>
            <input type="text" name="name" id="name" 
                   class="w-full rounded-xl border border-[#e3e3e0] bg-white p-3 text-[#1b1b18] focus:border-[#FFC89C] focus:ring-[#FFC89C]" 
                   placeholder="Enter category name" required>
        </div>

        {{-- Description --}}
        <div class="mb-6">
            <label class="block text-[#1b1b18] font-medium mb-2" for="description">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full rounded-xl border border-[#e3e3e0] bg-white p-3 text-[#1b1b18] focus:border-[#FFC89C] focus:ring-[#FFC89C]"
                      placeholder="Write a short description..."></textarea>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end space-x-3">
            <a href=href="{{ route('seller.categories.index') }}"
               class="px-5 py-2.5 rounded-xl border border-[#e3e3e0] text-[#1b1b18] hover:bg-[#f5f3f0]">Cancel</a>
            <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-[#FFC89C] text-[#1b1b18] font-medium hover:bg-[#ffb97c] transition">
                Save Category
            </button>
        </div>
    </form>
</div>
@endsection
