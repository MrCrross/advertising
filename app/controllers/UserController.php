<?php

namespace Controllers;

use Core\Auth;
use Core\Controller;
use Core\View;
use Illuminate\Database\Capsule\Manager as Capsule;
use Models\User;
use Throwable;

class UserController extends Controller
{
    public function changePassword()
    {
        $id = Auth::user()->id;
        if(isset($_POST['id'])) $id = $_POST['id'];
        $password = $_POST['password'];
        Capsule::beginTransaction();
        try{
            User::where('id',$id)->update([
                'password'=>hash('sha256',$password)
            ]);
            Capsule::commit();
            $_SESSION['message'] = 'Пароль успешно изменен';
            View::redirect('/lk');
        }catch (Throwable $e){
            Capsule::rollback();
            $_SESSION['message'] = 'Произошла ошибка:'. $e->getMessage();
            View::redirect('/lk');
        }
    }

    public function update()
    {
        $id = Auth::user()->id;
        if(isset($_POST['id'])) $id = $_POST['id'];
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        Capsule::beginTransaction();
        try{
            User::where('id',$id)->update([
                'name'=>$name,
                'last_name'=>$last_name,
                'first_name'=>$first_name,
                'city_id'=>$city,
                'address'=>$address
            ]);
            Capsule::commit();
            $_SESSION['message'] = 'Данные успешно изменены';
            View::redirect('/lk');
        }catch (Throwable $e){
            Capsule::rollback();
            $_SESSION['message'] = 'Произошла ошибка:'. $e->getMessage();
            View::redirect('/lk');
        }
    }
}
