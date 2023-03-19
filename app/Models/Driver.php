<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cars(){
        return $this->hasManyThrough(Car::class, CarDriver::class, 'driver_id', 'id', 'id', 'car_id');
    }
}
