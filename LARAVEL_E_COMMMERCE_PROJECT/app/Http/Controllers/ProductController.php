<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function dashboard()
    {
        $sellerId = Auth::id();

        // Monthly earnings (placeholder — adjust if you have an Orders model)
        $monthlyEarnings = 0;

        // Count today's orders (adjust this if you have an orders table)
        $totalOrdersToday = 0;

        // ✅ Low Stock Products (10 or below)
        // ✅ Low Stock Products (10 or below)
        $lowStockProducts = Product::where('seller_id', $sellerId)
                            ->where('stock', '<=', 10)
                            ->get();
        $lowStockCount = $lowStockProducts->count();

        // Optional: Fetch recent activities (you can customize)
        $recentActivities = [
            [
                'type' => 'update',
                'description' => 'Checked low-stock products.',
                'time' => now()->diffForHumans(),
            ],
        ];

        // Optional: New customers (if tracking)
        $newCustomersCount = 0;

        return view('seller.seller_dashboard', compact(
            'monthlyEarnings',
            'totalOrdersToday',
            'lowStockProducts',
            'lowStockCount', // make sure this is passed
            'newCustomersCount',
            'recentActivities'
        ));

    }
    // Display all products (for the logged-in seller)
    public function index(Request $request)
    {
        $sellerId = Auth::id();

        // Fetch categories for the filter dropdown
        $categories = Category::all();

        // Base query for seller's products
        $query = Product::where('seller_id', $sellerId);

        // Apply category filter if selected
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Apply search filter
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Paginate results
        $products = $query->paginate(10);

        // Return to the view with both products and categories
        return view('seller.products.index', compact('products', 'categories'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::all();
        return view('seller.products.create', compact('categories'));
    }

    // Store a new product
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'category_id' => $request->category_id,
            'seller_id' => Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('seller.products.index')
            ->with('success', 'Product created successfully!');
    }

    // Show edit form
    public function edit(Product $product)
    {
        $this->authorizeProduct($product);

        $categories = Category::all();
        return view('seller.products.edit', compact('product', 'categories'));
    }

    // Update a product
    public function update(Request $request, Product $product)
    {
        $this->authorizeProduct($product);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $product->image,
        ]);

        return redirect()
            ->route('seller.products.index')
            ->with('success', 'Product updated successfully!');
    }

    // Delete a product
    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('seller.products.index')
            ->with('success', 'Product deleted successfully!');
    }

    // Show product details
    public function show(Product $product)
    {
        $this->authorizeProduct($product);
        return view('seller.products.show', compact('product'));
    }

    // Prevent sellers from accessing others’ products
    private function authorizeProduct(Product $product)
    {
        if ($product->seller_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this product.');
        }
    }
}
