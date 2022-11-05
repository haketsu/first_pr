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
        $data=Car::select('model','id')->where('clients_id',$request->id)->get();
        return response()->json($data);//then sent this data to ajax success
    }

}
