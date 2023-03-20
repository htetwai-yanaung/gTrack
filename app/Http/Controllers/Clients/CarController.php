<?php

namespace App\Http\Controllers\Clients;

use App\Models\Car;
use App\Models\User;
use App\Models\Driver;
use App\Models\CarDriver;
use App\Models\CheckList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    //index
    public function index(){
        $cars = Car::where('company_id',Auth::user()->id)->get();
        return view('clients.cars.index')->with([
            'cars' => $cars,
        ]);
    }

    //create
    public function create(){
        return view('clients.cars.create');
    }

    //store
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'color' => 'required',
            'license' => 'required',
            'year' => 'required',
            'color' => 'required',
            'fuel' => 'required',
            'number' => 'required',
        ]);
        $car = [
            'name' => $request->name,
            'company_id' => Auth::user()->id,
            'model' => $request->model,
            'color' => $request->color,
            'license' => $request->license,
            'year' => $request->year,
            'color' => $request->color,
            'fuel' => $request->fuel,
            'number' => $request->number,
        ];
        Car::create($car);
        return redirect()->route('cars.index');
    }

    //details
    public function details($id){
        $car = Car::with('drivers')->find($id);
        $checkList = CheckList::where('car_id',$id)->orderBy('status','asc')->get();
        $drivers = User::where('role', 'driver')->where('status', '0')->where('company_id',Auth::user()->id)->get();
        return view('clients.cars.details')->with([
            'car' => $car,
            'drivers' => $drivers,
            'checkList' => $checkList
        ]);
    }

    //edit
    public function edit($id){
        $car = Car::where('id',$id)->first();
        return view('clients.cars.edit')->with([
            'car' => $car,
        ]);
    }

    //update
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'color' => 'required',
            'license' => 'required',
            'year' => 'required',
            'color' => 'required',
            'fuel' => 'required',
            'number' => 'required',
        ]);
        $car = [
            'name' => $request->name,
            'company_id' => Auth::user()->id,
            'model' => $request->model,
            'color' => $request->color,
            'license' => $request->license,
            'year' => $request->year,
            'color' => $request->color,
            'fuel' => $request->fuel,
            'number' => $request->number,
        ];
        Car::where('id', $id)->update($car);
        return redirect()->route('cars.index');
    }
}
