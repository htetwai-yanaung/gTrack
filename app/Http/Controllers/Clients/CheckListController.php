<?php

namespace App\Http\Controllers\Clients;

use App\Models\Car;
use App\Models\CheckList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckListController extends Controller
{
    //index
    public function index(){
        $cars = Car::get();
        $checkList = CheckList::get();
        return view('clients.check-list.index')->with([
            'cars' => $cars,
            'checkList' => $checkList
        ]);
    }

    //store
    public function store(Request $request){
        $request->validate([
            'car_id' => 'required',
            'title' => 'required',
        ]);
        CheckList::create([
            'title' => $request->title,
            'car_id' => $request->car_id,
        ]);
        return back();
    }

    //delete
    public function delete(Request $request){
        $checkListId = $request->checkListId;
        CheckList::where('id', $checkListId)->delete();
        return back();
    }
}
