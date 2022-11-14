<?php

namespace App\Http\Controllers;

use App\Models\Client;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name_surname'=>'required|min:3',
            'sex'=>'required',
            'phone_num'=>'required|regex:/\+7([0-9]){10}$/|unique',
            'address'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'color'=>'required',
            'car_number'=>'required',
            'status_flag'=>'required',
        ]);
        DB::table('clients')->insert([
            'name_surname'=>$request->name_surname,
            'sex'=>$request->sex,
            'phone_num'=>$request->phone_num,
            'address'=>$request->address,
        ]);
        $id=DB::select('SELECT id FROM clients ORDER BY id DESC LIMIT 1');
        DB::table('cars')->insert([
            'brand'=>$request->brand,
            'model'=>$request->model,
            'clients_id'=>$id[0]->id,
            'color'=>$request->color,
            'car_number'=>$request->car_number,
            'status_flag'=>$request->status_flag]);
        return redirect()->route('main.show_all');
    }

    public function edit(Client $client)
    {
        return view('edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_surname'=>'required|min:3',
            'sex'=>'required',
            'phone_num'=>'required|regex:/\+7([0-9]){10}$/|unique',
            'address'=>'required',
        ]);
        DB::table('clients')->where('id',$id)->update([
            'name_surname'=>$request->name_surname,
            'sex'=>$request->sex,
            'phone_num'=>$request->phone_num,
            'address'=>$request->address,
        ]);
        return redirect()->route('main.show_all');
    }

    public function destroy($client)
    {
        DB::delete("delete from cars where cars.clients_id=$client");
        DB::delete("delete from clients where id=$client");
        return redirect()->route('main.show_all');
    }

    public function show_all()
    {
//        $clients=DB::select("SELECT clients.name_surname, clients.id, clients.phone_num, clients.sex, clients.address, cars.brand, cars.model, cars.color, cars.car_number FROM clients
//join cars where clients_id = clients.id;")->paginate(1);
        $clients=DB::table('clients')->join('cars', 'cars.clients_id','=','clients.id')
            ->select('clients.name_surname','clients.id','clients.phone_num','clients.sex','clients.address','cars.brand', 'cars.model', 'cars.color', 'cars.car_number')
            ->orderBy('clients.id')
            ->get();
        $enc = json_encode($clients, JSON_UNESCAPED_UNICODE);
        return view('index',["clients"=>json_decode($enc,true)]);
    }
}
