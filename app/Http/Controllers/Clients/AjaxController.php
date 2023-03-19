<?php

namespace App\Http\Controllers\Clients;

use App\Models\CheckList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function list(Request $request){
        logger($request->carId);
        $checkList = CheckList::where('car_id', $request->carId)->get();
        return response()->json($checkList, 200);
    }

    public function check(Request $request){
        logger($request->checkListId);
        CheckList::where('id', $request->checkListId)->update([
            'status' => $request->status,
        ]);
    }
}
