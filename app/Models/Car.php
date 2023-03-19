<?php

namespace App\Models;

use App\Models\User;
use App\Models\Driver;
use App\Models\CarDriver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function drivers(){
        return $this->hasManyThrough(User::class, CarDriver::class, 'car_id', 'id', 'id', 'user_id');
    }
}
