<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        Client::store($request);
        Car::store($request);
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
            'phone_num'=>'required|regex:/\+7([0-9]){10}$/|unique:clients,phone_num,'.$id.',id',
            'address'=>'required',
        ]);
        $client = Client::find($id);
        $client->name_surname=$request->name_surname;
        $client->sex=$request->sex;
        $client->phone_num=$request->phone_num;
        $client->address=$request->address;
        $client->save();
        return redirect()->route('main.show_all');
    }

    public function destroy($client)
    {
        $client = Client::find($client);
        $client->delete();

        return redirect()->route('main.show_all');
    }

    public function show_all()
    {
        $clients=DB::table('clients')->join('cars', 'cars.clients_id','=','clients.id')
            ->select('clients.name_surname','clients.id','clients.phone_num','clients.sex','clients.address','cars.brand', 'cars.model', 'cars.color', 'cars.car_number')
            ->orderBy('clients.id')
            ->get();
        $enc = json_encode($clients, JSON_UNESCAPED_UNICODE);
        return view('index',["clients"=>json_decode($enc,true)]);

//        $pagesize = 8;
//        $offset = $pagesize * ($page - 1);
//        $count = DB::select("SELECT COUNT(*) as count from clients join cars on clients.id = cars.clients_id")[0]->count;
//        $data = DB::select("SELECT clients.id, clients.name_surname,clients.phone_num, clients.sex,clients.address, cars.brand, cars.car_number,cars.status_flag, cars.id FROM
//        clients JOIN cars on clients.id = cars.clients_id  ORDER BY clients.id asc LIMIT $offset,$pagesize");
//
//        $btamount = ceil(($count / $pagesize));
//        $prev = $page > 1 ? $page - 1 : 1;
//        $next = $page < $btamount ? $page + 1 : $page;
//        $enc = json_encode($data, JSON_UNESCAPED_UNICODE);
//
//        return view('index',["clients"=>json_decode($enc,true), "btn"=>$btamount,'prev'=>$prev, 'next'=>$next, 'page'=>$page]);
    }
}
