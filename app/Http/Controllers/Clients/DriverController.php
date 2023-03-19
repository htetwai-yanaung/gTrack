<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    //index
    public function index(){
        $drivers = User::where('role', 'driver')->where('company_id',Auth::user()->id)->get();
        return view('clients.drivers.index')->with([
            'drivers' => $drivers,
        ]);
    }

    //create
    public function create(){
        return view('clients.drivers.create');
    }

    //store
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'photo' => 'required|mimes:png,jpg',
            'license' => 'required',
            'address' => 'required',
        ]);
        $photo = uniqid().'_'.$request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(public_path('images'),$photo);
        $driver = [
            'name' => $request->name,
            'age' => $request->age,
            'license' => $request->license,
            'address' => $request->address,
            'photo' => $photo,
            'phone' =>$request->phone,
        ];
        Driver::create($driver);
        return redirect()->route('drivers.index');
    }

    //profile
    public function profile($id){
        $driver = User::with('cars')->find($id);
        return view('clients.drivers.profile')->with([
            'driver' => $driver,
        ]);
    }
}
