<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'courier_id',
        'lat',
        'lng',
        'recorded_at'
    ];

    protected function casts()
    {
        return [
            'recorded_at' => 'datetime'
        ];
    }

    //relations
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }
}
