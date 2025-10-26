<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // -------------------------------
    // Seller Dashboard
    // -------------------------------
    public function dashboard()
    {
        $sellerId = Auth::id();

        $monthlyEarnings = 0;
        $totalOrdersToday = 0;

        $lowStockProducts = Product::where('seller_id', $sellerId)
            ->where('stock', '<=', 10)
            ->get();
        $lowStockCount = $lowStockProducts->count();

        $recentActivities = [
            [
                'type' => 'update',
                'description' => 'Checked low-stock products.',
                'time' => now()->diffForHumans(),
            ],
        ];

        $newCustomersCount = 0;

        return view('seller.dashboard', compact(
            'monthlyEarnings',
            'totalOrdersToday',
            'lowStockProducts',
            'lowStockCount',
            'newCustomersCount',
            'recentActivities'
        ));
    }

    // -------------------------------
    // Display all seller products
    // -------------------------------
    public function index(Request $request)
    {
        $sellerId = Auth::id();
        $categories = Category::all();

        $query = Product::where('seller_id', $sellerId);

        // Filters
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(10);

        return view('seller.products.index', compact('products', 'categories'));
    }

    // -------------------------------
    // Show create product form
    // -------------------------------
    public function create()
    {
        $categories = Category::all();
        return view('seller.products.create', compact('categories'));
    }

    // -------------------------------
    // Store new product
    // -------------------------------
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

        // Store image (if provided)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Save product
        $product = Product::create([
            'category_id' => $request->category_id,
            'seller_id' => Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        // Redirect based on user type
        if (Auth::user()->user_type === 'seller') {
            return redirect()
                ->route('seller.products.index')
                ->with('success', 'Product created successfully!');
        }

        return redirect()
            ->route('user.user_page')
            ->with('success', 'Product added successfully!');
    }

    // -------------------------------
    // Edit product
    // -------------------------------
    public function edit(Product $product)
    {
        $this->authorizeProduct($product);

        $categories = Category::all();
        return view('seller.products.edit', compact('product', 'categories'));
    }

    // -------------------------------
    // Update product
    // -------------------------------
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

    // -------------------------------
    // Delete product
    // -------------------------------
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

    // -------------------------------
    // Show product details
    // -------------------------------
    public function show(Product $product)
    {
        $this->authorizeProduct($product);
        return view('seller.products.show', compact('product'));
    }

    // -------------------------------
    // Show all products for users
    // -------------------------------
    public function showProducts(Request $request)
    {
        $query = Product::query();

        // Optional search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Optional sort
        if ($request->sort === 'price_low_high') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'price_high_low') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest(); // default
        }

        $products = $query->get();

        return view('user.user_page', compact('products'));
    }

    // -------------------------------
    // Prevent unauthorized access
    // -------------------------------
    private function authorizeProduct(Product $product)
    {
        if ($product->seller_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this product.');
        }
    }
}
