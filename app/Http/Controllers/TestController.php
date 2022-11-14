<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TestController extends BaseController
{
    public function funct()
    {
        $clients=Client::all();
        return view('list',compact('clients'));
    }

    public function findName(Request $request)
    {
        $data=Car::select('brand','model','id','car_number')->where('clients_id',$request->id)->get();
        return response()->json($data);
    }

}
