<?php

namespace Seeders;

use Illuminate\Database\Seeder;
use Models\City;
use Models\User;

class UserSeeder extends Seeder
{

    public function run(){

        $cities= [
            [
                'name'=>'Иркутск'
            ],
            [
                'name'=>'Москва'
            ],
            [
                'name'=>'Санкт-Петербург'
            ],
        ];

        $users =[
            [
                'name'=>'root',
                'password'=>hash('sha256','qweqwe123'),
                'first_name'=>'Петр',
                'last_name'=>'Петров',
                'role'=>1,
                'address'=>'ул. Каменова, д. 33, кв. 12',
                'phone'=>'79999999981',
                'city_id'=>1,
            ],
            [
                'name'=>'user',
                'password'=>hash('sha256','qweqwe123'),
                'first_name'=>'Петр',
                'last_name'=>'Петров',
                'role'=>2,
                'address'=>'ул. Каменова, д. 33, кв. 12',
                'phone'=>'79999999991',
                'city_id'=>1,
            ]
        ];

        foreach ($cities as $city){
            City::create([
                'name'=>$city["name"]
            ]);
        }
        foreach ($users as $user){
            User::create([
                'name'=>$user["name"],
                'password'=>$user["password"],
                'first_name'=>$user["first_name"],
                'last_name'=>$user["last_name"],
                'role'=>$user["role"],
                'address'=>$user["address"],
                'phone'=>$user["phone"],
                'city_id'=>$user["city_id"],
            ]);
        }

    }
}