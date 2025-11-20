<?php
// app/Models/Address.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'first_name',
        'last_name',
        'company_name',
        'country',
        'street_address',
        'apartment',
        'city',
        'state',
        'zip_code',
        'phone',
        'email',
        'is_default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope for billing addresses
    public function scopeBilling($query)
    {
        return $query->where('type', 'billing');
    }

    // Scope for shipping addresses
    public function scopeShipping($query)
    {
        return $query->where('type', 'shipping');
    }

    // Get full address as string
    public function getFullAddressAttribute()
    {
        $address = "{$this->first_name} {$this->last_name}";
        
        if ($this->company_name) {
            $address .= ", {$this->company_name}";
        }
        
        $address .= ", {$this->street_address}";
        
        if ($this->apartment) {
            $address .= ", {$this->apartment}";
        }
        
        $address .= ", {$this->city}, {$this->state} {$this->zip_code}";
        $address .= ", {$this->country}";
        $address .= ", Phone: {$this->phone}";
        $address .= ", Email: {$this->email}";
        
        return $address;
    }
}