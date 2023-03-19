<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use App\Models\Driver;
use App\Models\CarDriver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarDriverController extends Controller
{
    //add car driver
    public function addDriver($car_id, $driver_id){
        // dd($car_id, $driver_id);
        CarDriver::create([
            'car_id' => $car_id,
            'user_id' => $driver_id,
        ]);
        User::where('id',$driver_id)->update([
            'status' => '1',
        ]);
        return back();
    }

    //remove car driver
    public function removeDriver($car_id, $driver_id){
        CarDriver::where('car_id', $car_id)->where('user_id',$driver_id)->delete();
        User::where('id',$driver_id)->update([
            'status' => '0',
        ]);
        return back();
    }
}
