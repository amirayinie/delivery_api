<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'organization_id',
        'assigned_courier_id',
        'pickup_lat',
        'pickup_lng',
        'pickup_address',
        'sender_name',
        'sender_mobile',
        'destination_lat',
        'destination_lng',
        'destination_address',
        'receiver_name',
        'receiver_mobile',
        'status',
        'requested_at',
        'picked_up_at',
        'delivered_at',
        'canceled_at',
    ];

    protected function casts()
    {
        return [
        'requested_at'=> 'datetime',
        'picked_up_at'=> 'datetime',
        'delivered_at'=> 'datetime',
        'canceled_at' => 'datetime',
        ];
    }
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
