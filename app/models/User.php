<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'password',
        'role',
        'first_name',
        'last_name',
        'address',
        'phone',
        'city_id'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public static function getNameRole($role){
        switch ($role){
            case 1: return 'admin'; break;
            case 2: return 'user'; break;
        }
    }
}