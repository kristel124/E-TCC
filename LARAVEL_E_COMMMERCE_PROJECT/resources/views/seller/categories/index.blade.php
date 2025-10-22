@extends('seller.seller_dashboard')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-[#1b1b18]">🗂️ Categories</h2>
        <a href="{{ route('seller.categories.create') }}"
           class="bg-[#FFC89C] text-[#1b1b18] font-medium px-5 py-2.5 rounded-xl hover:bg-[#ffb97c] transition">
            + Add Category
        </a>
    </div>
        @if(session('success'))
            <div class="mb-4 bg-[#E6F6E6] border border-[#A8E6A3] text-[#1b1b18] px-4 py-3 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-xl border border-[#e3e3e0] shadow-lg bg-[#FDFDFC]">
            <table class="min-w-full border-collapse text-left text-[#1b1b18]">
                <thead class="bg-[#f5f3f0] border-b border-[#e3e3e0]">
                    <tr>
                        <th class="px-6 py-3 font-medium">CategoryId</th>
                        <th class="px-6 py-3 font-medium">Name</th>
                        <th class="px-6 py-3 font-medium">Description</th>
                        <th class="px-6 py-3 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $index => $category)
                        <tr class="border-t border-[#e3e3e0] hover:bg-[#f9f7f5] transition">
                            <td class="px-6 py-3">{{ $index + 1 }}</td>
                            <td class="px-6 py-3 font-semibold">{{ $category->name }}</td>
                            <td class="px-6 py-3">{{ $category->description ?? '—' }}</td>
                            <td class="px-6 py-3 text-right">
                                <a href="{{ route('seller.categories.edit', $category->id) }}"
                                class="text-[#1b1b18] hover:text-[#ffb97c] font-medium mr-3">Edit</a>
                                <form action="{{ route('seller.categories.destroy', $category->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this category?')"
                                            class="text-red-500 hover:text-red-600 font-medium">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-[#6b7280]">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
</div>    
@endsection
