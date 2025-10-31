<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatusLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'from_status',
        'to_status',
        'actor',
        'actor_id',
        'meta',
        'changed_at'
    ];

    protected function casts()
    {
        return [
            'meta' => 'array',
            'changed_at' => 'datetime'
        ];
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
