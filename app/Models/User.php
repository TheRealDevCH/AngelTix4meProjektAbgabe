<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_token',
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'country',
        'postal_code',
        'date_of_birth',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
        ];
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->user_token)) {
                $user->user_token = self::generateUniqueToken();
            }
        });
    }

    private static function generateUniqueToken(): string
    {
        do {
            $token = strtoupper(Str::random(12));
        } while (self::where('user_token', $token)->exists());

        return $token;
    }
}
