<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = $this->getFilteredProducts($request);
        $categories = $this->getCategoriesWithCounts();

        // Get counts for availability filters
        $counts = $this->getProductCounts();

        if ($request->ajax()) {
            // Return JSON for AJAX requests
            return response()->json([
                'products' => $this->formatProducts($products->items()),
                'pagination' => $this->formatPagination($products),
                'total_products' => $products->total(),
                'filters' => $this->getActiveFilters($request)
            ]);
        }

        return view('pages.frontend.shop', array_merge(
            compact('products', 'categories'),
            $counts
        ));
    }

    private function getFilteredProducts(Request $request)
    {
        $query = Product::with(['categories', 'featuredImage']);

        // Category filter
        if ($request->has('category') && !empty($request->category)) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->whereIn('product_categories.id', $request->category);
            });
        }

        // Availability filter
        if ($request->has('availability') && !empty($request->availability)) {
            if (in_array('sale', $request->availability)) {
                $query->whereNotNull('sale_price')->where('sale_price', '>', 0);
            }
            if (in_array('instock', $request->availability)) {
                $query->where(function($q) {
                    $q->where('stock_quantity', '>', 0)
                      ->orWhereNull('stock_quantity');
                });
            }
            if (in_array('outstock', $request->availability)) {
                $query->where('stock_quantity', 0);
            }
        }

        // Price filter
        $minPrice = $request->get('min_price', 0);
        $maxPrice = $request->get('max_price', 10000);
        
        $query->where(function($q) use ($minPrice, $maxPrice) {
            $q->whereBetween('regular_price', [$minPrice, $maxPrice])
              ->orWhereBetween('sale_price', [$minPrice, $maxPrice]);
        });

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOptions = [
            'created_at' => ['field' => 'created_at', 'direction' => 'desc'],
            'name_asc' => ['field' => 'title', 'direction' => 'asc'],
            'name_desc' => ['field' => 'title', 'direction' => 'desc'],
            'price_asc' => ['field' => 'sale_price', 'direction' => 'asc'],
            'price_desc' => ['field' => 'sale_price', 'direction' => 'desc'],
        ];

        $sortConfig = $sortOptions[$sortBy] ?? $sortOptions['created_at'];
        
        return $query->orderBy($sortConfig['field'], $sortConfig['direction'])
                    ->paginate(6)
                    ->withQueryString(); // This preserves all query parameters
    }

    private function getCategoriesWithCounts()
    {
        return ProductCategory::withCount(['products' => function($query) {
            $query->where(function($q) {
                $q->where('stock_quantity', '>', 0)->orWhereNull('stock_quantity');
            });
        }])->get();
    }

    private function getProductCounts()
    {
        return [
            'totalProducts' => Product::count(),
            'saleProductsCount' => Product::whereNotNull('sale_price')->where('sale_price', '>', 0)->count(),
            'inStockCount' => Product::where(function($q) {
                $q->where('stock_quantity', '>', 0)->orWhereNull('stock_quantity');
            })->count(),
            'outOfStockCount' => Product::where('stock_quantity', 0)->count(),
        ];
    }

    private function formatProducts($products)
    {
        return collect($products)->map(function($product) {
            $discount = null;
            if ($product->sale_price && $product->regular_price) {
                $discount = round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100);
            }

            return [
                'id' => $product->id,
                'title' => $product->title,
                'slug' => $product->slug,
                'regular_price' => number_format($product->regular_price, 2),
                'sale_price' => $product->sale_price ? number_format($product->sale_price, 2) : null,
                'image' => $product->featuredImage ? asset($product->featuredImage->url) : null ,
                'discount' => $discount,
                'url' => route('product.show', $product->slug)
            ];
        })->toArray();
    }

    private function formatPagination($products)
    {
        return [
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
            'per_page' => $products->perPage(),
            'total' => $products->total(),
            'prev_url' => $products->previousPageUrl(),
            'next_url' => $products->nextPageUrl(),
            'pages' => $products->getUrlRange(1, $products->lastPage())
        ];
    }

    private function getActiveFilters($request)
    {
        $filters = [];
        
        if ($request->has('category') && !empty($request->category)) {
            $filters['categories'] = $request->category;
        }
        
        if ($request->has('availability') && !empty($request->availability)) {
            $filters['availability'] = $request->availability;
        }
        
        if ($request->has('min_price') || $request->has('max_price')) {
            $filters['price'] = [
                'min' => $request->get('min_price', 0),
                'max' => $request->get('max_price', 10000)
            ];
        }

        return $filters;
    }
}