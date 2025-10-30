<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function  courier()
    {
        return $this->belongsTo(Courier::class, 'assigned_courier_id');
    }

    public function statusLogs()
    {
        return $this->hasMany(OrderStatusLog::class);
    }
    public function assignments()
    {
        return $this->hasMany(OrderAssignment::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function webhookDeliveries()
    {
        return $this->hasMany(WebhookDelivery::class);
    }

    public function couriers()
    {
        return $this->belongsToMany(Courier::class, 'order_assignments')
            ->withPivot(['state', 'meta'])
            ->withTimestamps();
    }
}
