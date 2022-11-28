<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_surname',
        'sex',
        'phone_num',
        'address',
    ];

    public static function store(Request $request)
    {
        $request->validate([
            'name_surname'=>'required|min:3',
            'sex'=>'required',
            'phone_num'=>'required|unique:clients|regex:/\+7([0-9]){10}$/',
            'address'=>'required',
        ]);
        DB::table('clients')->insert([
            'name_surname'=>$request->name_surname,
            'sex'=>$request->sex,
            'phone_num'=>$request->phone_num,
            'address'=>$request->address,
        ]);
    }

    protected $table = 'clients';
    protected $guarded = false;
}
