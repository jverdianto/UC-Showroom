<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'roda_ban',
        'luas_area_kargo'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
