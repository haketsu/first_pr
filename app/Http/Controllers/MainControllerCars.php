<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainControllerCars extends Controller
{
    public function indexCar()
    {
        $cars=DB::table('cars')->get();
        return view('indexcars',
            ['cars'=>DB::table('cars')->paginate(10)],
            compact('cars'));
    }

    public function createCar()
    {
        $clients=DB::select('select * from clients');
        return view('createcars',compact('clients'));
    }

    public function storeCar(Request $request)
    {
        DB::table('cars')->insert([
            'clients_id'=>$request->clients_id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'color'=>$request->color,
            'car_number'=>$request->car_number,
            'status_flag'=>$request->status_flag,
        ]);
        return redirect()->route('main.show_all_cars');
    }

    public function editCar($id)
    {
        $clients=DB::select('select * from clients');
        $car=DB::table('cars')->find($id);
        return view('editcars', compact('car','clients'));
    }

public function updateCar(Request $request, $id)
{
        DB::table('cars')->where('id',$id)->update([
            'clients_id'=>$request->clients_id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'color'=>$request->color,
            'car_number'=>$request->car_number,
            'status_flag'=>$request->status_flag,
        ]);
    return redirect()->route('main.show_all_cars');
}

    public function destroyCar($id)
    {
        DB::table('cars')->where('id',$id)->delete();
        return redirect()->route('main.show_all_cars');
    }

    public function show_all_cars()
    {
        $cars=DB::table('cars')
            ->select('id','brand','model','car_number','status_flag')
            ->where('status_flag', '=','1')->get();
        $enc = json_encode($cars, JSON_UNESCAPED_UNICODE);
        return view('indexcars',["cars"=>json_decode($enc,true)]);
    }

    public function show_all_carss()
    {
        $cars=DB::table('cars')
            ->select('id','brand','model','car_number','status_flag','clients_id')
            ->orderBy('clients_id')
            ->get();
        $enc = json_encode($cars, JSON_UNESCAPED_UNICODE);
        return view('allcars',["cars"=>json_decode($enc,true)]);
    }

}
