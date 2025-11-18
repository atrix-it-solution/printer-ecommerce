<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'subtotal',
        'discount_amount',
        'total_amount',
        'payment_method',
        'payment_status',
        'order_status',
        'billing_first_name',
        'billing_last_name',
        'billing_email',
        'billing_phone',
        'billing_country',
        'billing_street_address',
        'billing_apartment',
        'billing_city',
        'billing_state',
        'billing_zip_code',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone',
        'shipping_country',
        'shipping_street_address',
        'shipping_apartment',
        'shipping_city',
        'shipping_state',
        'shipping_zip_code',
        'order_notes',
        'coupon_code',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'product_price' => 'decimal:2',
        'product_regular_price' => 'decimal:2',
        'product_sale_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order items for the order.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Generate a unique order number
     */
    public static function generateOrderNumber(): string
    {
        $prefix = 'ORD';
        $date = now()->format('Ymd');
        $lastOrder = self::where('order_number', 'like', $prefix . $date . '%')->latest()->first();
        
        $sequence = $lastOrder ? (int) substr($lastOrder->order_number, -4) + 1 : 1;
        
        return $prefix . $date . str_pad($sequence, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Check if order is paid
     */
    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    /**
     * Check if order is pending
     */
    public function isPending(): bool
    {
        return $this->order_status === 'pending';
    }

    /**
     * Get formatted total amount
     */
    public function getFormattedTotalAttribute(): string
    {
        return '$' . number_format($this->total_amount, 2);
    }

    /**
     * Get formatted subtotal amount
     */
    public function getFormattedSubtotalAttribute(): string
    {
        return '$' . number_format($this->subtotal, 2);
    }

    /**
     * Get formatted discount amount
     */
    public function getFormattedDiscountAttribute(): string
    {
        return '$' . number_format($this->discount_amount, 2);
    }

    public function getStatusAttribute()
    {
        return $this->order_status;
    }
}