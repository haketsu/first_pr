<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'name_surname'=>'Саша',
                'phone_num'=>'79996667777',
                'sex'=>'w',
                'address'=>'aaa',
            ],
            [
            'name_surname'=>'Маша',
            'phone_num'=>'79996667771',
            'sex'=>'w',
            'address'=>'aaa',
            ],
            [
                'name_surname'=>'Даша',
                'phone_num'=>'79996667772',
                'sex'=>'w',
                'address'=>'bbb',
            ],
            [
                'name_surname'=>'Леша',
                'phone_num'=>'79996667773',
                'sex'=>'m',
                'address'=>'aaa',
            ],
            [
                'name_surname'=>'Паша',
                'phone_num'=>'79996667774',
                'sex'=>'m',
                'address'=>'bbb',
            ],
            [
                'name_surname'=>'Дана',
                'phone_num'=>'79996667775',
                'sex'=>'w',
                'address'=>'ccc',
            ],
            [
                'name_surname'=>'Даниил',
                'phone_num'=>'79996667776',
                'sex'=>'m',
                'address'=>'ccc',
            ],
            [
                'name_surname'=>'Ростислав',
                'phone_num'=>'79996667778',
                'sex'=>'m',
                'address'=>'vvv',
            ],
            [
                'name_surname'=>'Данил',
                'phone_num'=>'79996667779',
                'sex'=>'m',
                'address'=>'nnn',
            ]
        ]);
    }
}
