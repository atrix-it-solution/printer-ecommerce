<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PendingUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'verification_token',
        'token_created_at',
    ];

    protected $casts = [
        'token_created_at' => 'datetime',
    ];

    /**
     * Generate verification token
     */
    public static function generateVerificationToken()
    {
        return Str::random(60);
    }

    /**
     * Check if token is expired (24 hours)
     */
    public function isTokenExpired()
    {
        return $this->token_created_at->addHours(24)->isPast();
    }
}