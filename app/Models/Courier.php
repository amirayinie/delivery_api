<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Courier extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'password',
        'is_active'
    ];

    protected $hidden = [
        'password'
    ];


    protected function casts()
    {
        return [
            'password' => 'hashed'
        ];
    }

    //relations
    public function orders()
    {
        return $this->hasMany(Order::class, 'assigned_courier_id');
    }

    public function assignments()
    {
        return $this->hasMany(OrderAssignment::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
