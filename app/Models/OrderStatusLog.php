<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatusLog extends Model
{
    /** @use HasFactory<\Database\Factories\OrderStatusLogFactory> */
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
