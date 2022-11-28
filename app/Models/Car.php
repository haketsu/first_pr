<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'color',
        'car_number',
        'status_flag',
    ];

    public static function store(Request $request){
        if($request->has('clients_id')){
            $request->validate([
                'clients_id'=>'required',
                'brand'=>'required',
                'model'=>'required',
                'color'=>'required',
                'car_number'=>'required|unique:cars|min:6|max:6',
                'status_flag'=>'required',
            ]);
            $clients_id=$request->clients_id;
        }
        else {
            $clients_id = DB::table('clients')->select('id')->orderByDesc('id')->limit(1)->get()[0]->id;
            $request->validate([
                'brand' => 'required',
                'model' => 'required',
                'color' => 'required',
                'car_number' => 'required|unique:cars|min:6|max:6',
                'status_flag' => 'required',
            ]);
        }
        DB::table('cars')->insert([
            'clients_id'=>$clients_id,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'color'=>$request->color,
            'car_number'=>$request->car_number,
            'status_flag'=>$request->status_flag,
        ]);
    }

    protected $table = 'cars';
    protected $guarded = false;
}
