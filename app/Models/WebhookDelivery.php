<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebhookDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'organization_id',
        'event',
        'order_id',
        'payload',
        'status_code',
        'status_text',
        'attempts',
        'next_retry_at',
        'delivered_at'
    ];

    protected function casts()
    {
        return [
            'status_text'   => 'array',
            'next_retry_at' => 'datetime',
            'delivered_at'  => 'datetime'
        ];
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
