<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BlogCategoryController extends Controller
{
     public function index()
    {
        $categories = BlogCategory::all();
        $editCategory = null; // Make sure this is set
        
        return view('pages.dashboard.product.product_category.index', compact('categories', 'editCategory'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:product_categories,slug',
        ]);

        BlogCategory::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);
        
        // FIX: Use correct route name
        return redirect()->route('productcategories.index')->with('success', 'Product category created successfully!');
    }

    public function edit($id)
    {
        $editCategory = BlogCategory::findOrFail($id);  
        $categories = BlogCategory::all(); // Use all() instead of get()

        return view('pages.dashboard.product.product_category.index', compact('editCategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);

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
        $blogCategory = BlogCategory::findOrFail($id);
        $blogCategory->delete();

        // FIX: Use correct route name
        return redirect()
            ->route('productcategories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
