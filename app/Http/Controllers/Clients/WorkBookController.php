<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use App\Models\Driver;
use App\Models\Workbook;
use App\Models\CarDriver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkBookController extends Controller
{
    //crate page
    public function create(){
        return view('drivers.workbook');
    }

    //store
    public function store(Request $request){

        $request->validate([
            'started_date' => 'required',
            'started_time' => 'required',
            'from' => 'required',
            'to' => 'required',
            'distance' => 'required',
            'fuel' => 'required',
            'expenses' => 'required',
            'ended_date' => 'required',
            'ended_time' => 'required',
        ]);

        $driver_id = Auth::user()->id;
        $car = CarDriver::where('user_id',$driver_id)->first();
        $car_id = $car->car_id;

        Workbook::create([
            'user_id' => $driver_id,
            'car_id' => $car_id,
            'started_date' => $request->started_date,
            'started_time' => $request->started_time,
            'from' => $request->from,
            'to' => $request->to,
            'distance' => $request->distance,
            'fuel' => $request->fuel,
            'expenses' => $request->expenses,
            'ended_date' => $request->ended_date,
            'ended_time' => $request->ended_time,
        ]);

        return redirect()->route('workbook.history');
    }

    //history
    public function history(){
        $workbooks = Workbook::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('drivers.history')->with([
            'workbooks' => $workbooks,
        ]);
    }
}
