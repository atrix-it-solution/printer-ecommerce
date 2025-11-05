<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        $editCategory = null; // Make sure this is set
        
        return view('pages.dashboard.product.product_category.index', compact('categories', 'editCategory'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:product_categories,slug',
        ]);

        ProductCategory::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);
        
        // FIX: Use correct route name
        return redirect()->route('productcategories.index')->with('success', 'Product category created successfully!');
    }

    public function edit($id)
    {
        $editCategory = ProductCategory::findOrFail($id);  
        $categories = ProductCategory::all(); // Use all() instead of get()

        return view('pages.dashboard.product.product_category.index', compact('editCategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = ProductCategory::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:product_categories,slug,' . $id,
            'description' => 'nullable|string',
        ]);

        $category->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);

        // FIX: Use correct route name
        return redirect()->route('productcategories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();

        // FIX: Use correct route name
        return redirect()
            ->route('productcategories.index')
            ->with('success', 'Category deleted successfully.');
    }
}