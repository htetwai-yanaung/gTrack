<?php

namespace App\Http\Controllers\Clients;

use App\Models\Car;
use App\Models\CheckList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CheckListController extends Controller
{
    //index
    public function index(){
        $checkLists = CheckList::select('cl_number', DB::raw('count(*) as total'))->groupBy('cl_number')->orderBy('created_at', 'desc')->get();
        $cl_number_arr = [];
        foreach($checkLists as $checkList){
            $list = CheckList::where('cl_number',$checkList->cl_number)->orderBy('status', 'asc')->get();
            array_push($cl_number_arr, $list);
        }
        return view('clients.check-list.index')->with([
            'cl_list' => $cl_number_arr
        ]);
    }

    //create
    public function create(){
        $cars = Car::get();
        $checkList = CheckList::get();
        return view('clients.check-list.create')->with([
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
        // dd($request->title);
        $title_arr = $request->title;
        foreach($title_arr as $title){
                CheckList::create([
                'title' => $title,
                'car_id' => $request->car_id,
                'cl_number' => $request->cl_number,
                'note' => $request->note,
            ]);
        }
        return redirect()->route('checkList.index');
    }

    //delete
    public function delete(Request $request){
        $checkListId = $request->checkListId;
        CheckList::where('id', $checkListId)->delete();
        return back();
    }
}
