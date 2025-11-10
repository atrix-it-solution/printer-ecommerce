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
         $products = Product::with(['categories', 'featuredImage','galleryImages'])->get();
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
            'gallery_images' => 'nullable|string',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:product_categories,id',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:regular_price',
            'sku' => 'required|string|max:100|unique:products,sku',
            'stock_quantity' => 'nullable|integer|min:0',
        ]);

        // Create product
        // Create product
        $product = Product::create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'featured_image' => $data['featured_image'],
            'regular_price' => $data['regular_price'],
            'sale_price' => $data['sale_price'],
            'sku' => $data['sku'],
            'stock_quantity' => $data['stock_quantity'],
        ]);

        // Attach categories
        $product->categories()->attach($data['categories']);

        // Attach gallery images
        if (!empty($data['gallery_images'])) {
            $galleryImageIds = explode(',', $data['gallery_images']);
            $galleryImageIds = array_filter($galleryImageIds); // Remove empty values
            
            // Attach gallery images with sort order
            $syncData = [];
            foreach ($galleryImageIds as $index => $mediaId) {
                $syncData[$mediaId] = ['sort_order' => $index];
            }
            
            $product->galleryImages()->sync($syncData);
        }
;

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        // Load categories relationship
        $product->load('categories', 'galleryImages');
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
            'gallery_images' => 'nullable|string', 
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:product_categories,id',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:regular_price',
            'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
            'stock_quantity' => 'nullable|integer|min:0',
        ]);


        // Update product
        $product->update([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'featured_image' => $data['featured_image'],
            'regular_price' => $data['regular_price'],
            'sale_price' => $data['sale_price'],
            'sku' => $data['sku'],
            'stock_quantity' => $data['stock_quantity'],
        ]);

        // Sync categories
        $product->categories()->sync($data['categories']);

        // Sync gallery images
        if (isset($data['gallery_images'])) {
            $galleryImageIds = explode(',', $data['gallery_images']);
            $galleryImageIds = array_filter($galleryImageIds);
            
            $syncData = [];
            foreach ($galleryImageIds as $index => $mediaId) {
                $syncData[$mediaId] = ['sort_order' => $index];
            }
            
            $product->galleryImages()->sync($syncData);
        } else {
            // If no gallery images provided, remove all
            $product->galleryImages()->sync([]);
        }

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
