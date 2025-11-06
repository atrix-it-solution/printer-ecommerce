<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product; 
use App\Models\Product\ProductCategory; 
use App\Models\Media;
use Illuminate\Support\Facades\Storage; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $products = Product::with(['categories', 'featuredImage'])->get();
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
            'featured_image' => 'nullable|exists:media,id',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:product_categories,id',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:regular_price',
            'sku' => 'required|string|max:100|unique:products,sku',
            'stock_quantity' => 'nullable|integer|min:0',
        ]);

        // Create product
        $product = Product::create($data);

        // Attach categories
        $product->categories()->attach($data['categories']);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
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
            'featured_image' => 'nullable|exists:media,id', 
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:product_categories,id',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:regular_price',
            'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
            'stock_quantity' => 'nullable|integer|min:0',
        ]);


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
        

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

}
