<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizationFactory> */
    use HasFactory;

    protected $fillable = [];

    protected $casts = [];

    protected $hidden = [];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function webhookDeliveries()
    {
        return $this->hasMany(WebhookDelivery::class);
    }
}
