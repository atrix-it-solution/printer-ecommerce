<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product; 
use App\Models\Product\ProductCategory; 
use Illuminate\Support\Facades\Storage; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('pages.dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('pages.dashboard.product.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:product_categories,id',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:regular_price',
            'stock_quantity' => 'required|integer|min:0',
        ]);

       

        // Clean featured_image path if provided
        if (!empty($data['featured_image'])) {
            $data['featured_image'] = $this->cleanImagePath($data['featured_image']);
            \Log::info('Cleaned image path: ' . $data['featured_image']);
        }

        // Handle file upload (if using file input instead of media library)
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('products', 'public');
            $data['featured_image'] = $imagePath;
            \Log::info('Image uploaded: ' . $imagePath);
        }

        // Create product
        $product = Product::create($data);

        // Attach categories
        $product->categories()->attach($data['categories']);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }


   /**
     * Clean image path - store only relative path without 'storage/'
     */
    private function cleanImagePath($path)
    {
        // If it's a full URL, extract just the path part
        if (str_contains($path, '/storage/')) {
            $parts = explode('/storage/', $path);
            return end($parts); // Return only the part after /storage/
        }
        
        // If it starts with storage/, remove it
        if (str_starts_with($path, 'storage/')) {
            return substr($path, 8); // Remove 'storage/' from beginning
        }
        
        // For any other case, return as is
        return $path;
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        // Load categories relationship
        $product->load('categories');
        return view('pages.dashboard.product.create', compact('product', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'description' => 'nullable|string',
            'featured_image' => 'nullable|string', // Changed from image to string
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:product_categories,id',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:regular_price',
            'stock_quantity' => 'required|integer|min:0',
        ]);

        // Clean featured_image path if provided
        if (!empty($data['featured_image'])) {
            $data['featured_image'] = $this->cleanImagePath($data['featured_image']);
        }

        // Handle file upload (if using file input)
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($product->featured_image) {
                Storage::disk('public')->delete($product->featured_image);
            }
            $imagePath = $request->file('featured_image')->store('products', 'public');
            $data['featured_image'] = $imagePath;
        } else if (empty($data['featured_image'])) {
            // Keep the existing image if no new image provided
            $data['featured_image'] = $product->featured_image;
        }

        // Update product
        $product->update($data);

        // Sync categories
        $product->categories()->sync($data['categories']);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete associated image
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

}
