<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Vehicle
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'ukuran_bagasi',
        'kapasitas_bensin'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
