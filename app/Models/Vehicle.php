<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'tahun',
        'jumlah_penumpang',
        'manufaktur',
        'harga',
        'jenis'
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function motor()
    {
        return $this->hasOne(Motorcycle::class);
    }

    public function truk()
    {
        return $this->hasOne(Truck::class);
    }
}
