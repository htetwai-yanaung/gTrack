<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\CarDriver;
use App\Models\CheckList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login
    public function login(){
        return view('login');
    }

    //register
    public function register(){
        return view('register');
    }

    //driver login page
    public function driverLoginPage(){
        return view('clients.drivers.account.login');
    }

    //driver register page
    public function driverRegisterPage(){
        return view('clients.drivers.account.register');
    }

    //what role
    public function role(){
        if(Auth::user()->role == 'admin'){
            return view('admin.index');
        }else if(Auth::user()->role == 'client'){
            return redirect()->route('cars.index');
        }
        else{
            return redirect()->route('driver.checkList');
        }
    }

    //index
    public function index(){
        $driver = User::find(Auth::user()->id);
        return view('drivers.index')->with(['driver' => $driver]);
    }

    //driver create account
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'company_id' => 'required',
            'age' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'license' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        $driver = User::create([
            'name' => $request->name,
            'company_id' => $request->company_id,
            'company_name' => $request->company_name,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
            'license' => $request->license,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('driver.index');
    }


}
