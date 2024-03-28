<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'work',
        'address',
        'gender',
        'password',
        'number',
        'image',
        'point',
        'trial',
        'trialLevel',
        'status',
        'type',
        'promo1',
        'promo2',
        'promo3',
        'promo4',
        'promo5',
        'promo6',
        'level',
        'referral_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function referredBy()
    {
        return $this->belongsTo(User::class, 'referral_id');
    }

    public function referrals()
    {
    return $this->hasMany(User::class, 'referral_id');
    }
}
