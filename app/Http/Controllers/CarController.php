<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
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
        Car::store($request);
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
        $request->validate([
            'clients_id'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'color'=>'required',
            'car_number'=>'required|min:6|max:6|unique:cars,car_number,'.$id.',id',
            'status_flag'=>'required',
    ]);

        $car = Car::find($id);
        $car->clients_id=$request->clients_id;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->color=$request->color;
        $car->car_number=$request->car_number;
        $car->status_flag=$request->status_flag;
        $car->save();

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

    public function destroyCar($car)
    {
        $car = Car::find($car);
        $car->delete();
        //DB::table('cars')->where('id',$id)->delete();
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
