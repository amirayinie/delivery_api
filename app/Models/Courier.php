<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    /** @use HasFactory<\Database\Factories\CourierFactory> */
    use HasFactory;

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
}
