<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            [
                'brand'=>'Toyota',
                'model'=>'Auris',
                'color'=>'Black',
                'car_number'=>'a111aa',
                'status_flag'=>'1',
                'clients_id'=>'1',
            ],
            [
                'brand'=>'Toyota',
                'model'=>'CH-R',
                'color'=>'White',
                'car_number'=>'a112aa',
                'status_flag'=>'1',
                'clients_id'=>'1',
            ],
            [
                'brand'=>'Toyota',
                'model'=>'Rav4',
                'color'=>'Red',
                'car_number'=>'a113aa',
                'status_flag'=>'1',
                'clients_id'=>'2',
            ],
            [
                'brand'=>'Bentley',
                'model'=>'S3',
                'color'=>'Pink',
                'car_number'=>'a114aa',
                'status_flag'=>'1',
                'clients_id'=>'5',
            ],
            [
                'brand'=>'Bentley',
                'model'=>'S2',
                'color'=>'Black',
                'car_number'=>'a115aa',
                'status_flag'=>'1',
                'clients_id'=>'6',
            ],
            [
                'brand'=>'BMW',
                'model'=>'Z1',
                'color'=>'Black',
                'car_number'=>'a116aa',
                'status_flag'=>'1',
                'clients_id'=>'7',
            ],
            [
                'brand'=>'Audi',
                'model'=>'Typ SS',
                'color'=>'Black',
                'car_number'=>'a117aa',
                'status_flag'=>'1',
                'clients_id'=>'8',
            ],
            [
                'brand'=>'Lexus',
                'model'=>'UX',
                'color'=>'White',
                'car_number'=>'a118aa',
                'status_flag'=>'1',
                'clients_id'=>'9',
            ],
            [
                'brand'=>'Porshe',
                'model'=>'Panamera',
                'color'=>'Yellow',
                'car_number'=>'a119aa',
                'status_flag'=>'1',
                'clients_id'=>'3',
            ],
            [
                'brand'=>'Porshe',
                'model'=>'Cayman',
                'color'=>'Black',
                'car_number'=>'a120aa',
                'status_flag'=>'1',
                'clients_id'=>'2',
            ],
            [
                'brand'=>'Porshe',
                'model'=>'914',
                'color'=>'Black',
                'car_number'=>'a121aa',
                'status_flag'=>'1',
                'clients_id'=>'4',
            ]
        ]);
    }
}
