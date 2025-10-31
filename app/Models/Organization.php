<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'api_secret',
        'webhook_url',
        'webhook_secret',
        'is_active',
    ];

    protected $hidden =[
        'api_secret',
        'webhook_secret'
    ];

    protected function casts()
    {
        return [
            'api_secret' => 'hashed',
            'webhook_secret' => 'hashed'
        ];
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function webhookDeliveries()
    {
        return $this->hasMany(WebhookDelivery::class);
    }
}
