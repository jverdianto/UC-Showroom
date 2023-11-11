<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Vehicle
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'tipe_bahan_bakar',
        'luas_bagasi'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
