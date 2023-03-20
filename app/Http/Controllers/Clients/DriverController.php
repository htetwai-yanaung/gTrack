<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use App\Models\Driver;
use App\Models\Workbook;
use App\Models\CarDriver;
use App\Models\CheckList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'photo' => 'mimes:png,jpg',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'same:password',
            'license' => 'required',
            'address' => 'required',
        ]);

        $photo= $request->photo;

        if($request->hasFile('photo')){
            $photo = uniqid().'_'.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images'),$photo);
        }

        User::create([
            'company_name' => $request->company_name,
            'company_id' => Auth::user()->id,
            'role' => 'driver',
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'photo' => $photo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'license' => $request->license,
            'address' => $request->address,
        ]);
        return redirect()->route('drivers.index');
    }

    //profile
    public function profile($id){
        $driver = User::with('cars')->find($id);
        return view('clients.drivers.profile')->with([
            'driver' => $driver,
        ]);
    }

    //workbook list
    public function workbook(){
        $workbooks = Workbook::orderBy('created_at','desc')->get();
        return view('clients.drivers.workbook')->with([
            'workbooks' => $workbooks,
        ]);
    }

    //checklist
    public function checkList(){
        $id = Auth::user()->id;
        $car = CarDriver::select('car_id')->where('user_id', $id)->first();
        $carId = '';
        $checkList = [];
        if($car){
            $carId = $car->car_id;
            $checkList = CheckList::where('car_id', $carId)->orderBy('created_at','desc')->orderBy('status','asc')->get()->groupBy('cl_number');
        }
        // return $checkList;
        return view('drivers.check-list')->with([
            'checkList' => $checkList,
        ]);
    }
}
