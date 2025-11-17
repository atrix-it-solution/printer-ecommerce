<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product\Product; 


class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_slug',
        'product_price',
        'product_regular_price',
        'product_sale_price',
        'quantity',
        'total_price',
    ];

    protected $casts = [
        'product_price' => 'decimal:2',
        'product_regular_price' => 'decimal:2',
        'product_sale_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /**
     * Get the order that owns the order item.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product that owns the order item.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get formatted product price
     */
    public function getFormattedProductPriceAttribute(): string
    {
        return '$' . number_format($this->product_price, 2);
    }

    /**
     * Get formatted total price
     */
    public function getFormattedTotalPriceAttribute(): string
    {
        return '$' . number_format($this->total_price, 2);
    }
}