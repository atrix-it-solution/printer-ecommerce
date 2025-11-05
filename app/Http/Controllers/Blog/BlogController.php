<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('categories')->paginate(10);
        return view('pages.dashboard.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('pages.dashboard.blog.create-edit', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|string',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:blog_categories,id',
        ]);

        $blogData = $request->only(['title', 'slug', 'description', 'tags']);

         // Clean featured_image path if provided
        if (!empty($data['featured_image'])) {
            $data['featured_image'] = $this->cleanImagePath($data['featured_image']);
        }

        // Handle file upload (if using file input instead of media library)
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('products', 'public');
            $data['featured_image'] = $imagePath;
        }

        $blog = Blog::create($blogData);

        if ($request->filled('categories')) {
            $blog->categories()->sync($request->categories);
        }

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
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


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('pages.dashboard.blog.create-edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $id,
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|string',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:blog_categories,id',
        ]);

        $blogData = $request->only(['title', 'slug', 'description', 'tags']);

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

        $blog->update($blogData);

        if ($request->filled('categories')) {
            $blog->categories()->sync($request->categories);
        } else {
            $blog->categories()->detach();
        }

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete associated image
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }

}
