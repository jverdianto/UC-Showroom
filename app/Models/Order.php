<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'total_biaya'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    // Relasi one-to-one dengan model Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
