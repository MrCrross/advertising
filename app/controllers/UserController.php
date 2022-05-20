<?php

namespace  App\Controllers;


use App\Core\Auth;
use App\Core\Controller;
use App\Core\View;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;

use Throwable;

class UserController extends Controller
{
    public function changePassword()
    {
        $id = Auth::user()->id;
        if(isset($_POST['id'])) $id = $_POST['id'];
        $password = $_POST['password'];
        $address='/lk';
        if(Auth::user()->role===1){
            $address='/admin/users/edit';
        }
        Capsule::beginTransaction();
        try{
            User::where('id',$id)->update([
                'password'=>hash('sha256',$password)
            ]);
            Capsule::commit();
            $_SESSION['message'] = 'Пароль успешно изменен';
            View::redirect($address);
        }catch (Throwable $e){
            Capsule::rollback();
            $_SESSION['message'] = 'Произошла ошибка:'. $e->getMessage();
            View::redirect($address);
        }
    }

    public function create(){
        $login = $_POST['name'];
        $password = $_POST['password'];
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];
        Capsule::beginTransaction();
        try {
            User::create([
                'name'=>$login,
                'password'=>hash('sha256',$password),
                'last_name'=>$last_name,
                'role'=>$role,
                'first_name'=>$first_name,
                'city_id'=>$city,
                'address'=>$address,
                'phone'=>$phone,
            ]);
            Capsule::commit();
            $_SESSION['message'] = 'Пользователь успешно добавлен';
        }catch (Throwable $e){
            Capsule::rollback();
            $_SESSION['message'] = 'Произошла ошибка. Данные заполнены неверно.'.$e->getMessage();
        }
        View::redirect('/admin/users/create');
    }

    public function update()
    {
        $id = Auth::user()->id;
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $data = [
            'name'=>$name,
            'last_name'=>$last_name,
            'first_name'=>$first_name,
            'city_id'=>$city,
            'address'=>$address,
            'phone'=>$phone,
        ];
        $address='/lk';
        if(Auth::user()->role===1){
            $role = $_POST['role'];
            $data['role']=$role;
            $address='/admin/users/edit';
        }
        Capsule::beginTransaction();
        try{
            User::where('id',$id)->update($data);
            Capsule::commit();
            $_SESSION['message'] = 'Данные успешно изменены';
            View::redirect($address);
        }catch (Throwable $e){
            Capsule::rollback();
            $_SESSION['message'] = 'Произошла ошибка:'. $e->getMessage();
            View::redirect($address);
        }
    }

    public function delete(){
        $id = $_POST['id'];
        Capsule::beginTransaction();
        try{
            User::where('id',$id)->delete();
            Capsule::commit();
            $_SESSION['message'] = 'Пользователь успешно удален';
        }catch (Throwable $e){
            Capsule::rollBack();

            $_SESSION['message'] = 'Ошибка:' . $e->getMessage();
            if ($e->getCode()==='23000') $_SESSION['message'] = 'Невозможно удалить. Этот пользователь выложил объявления.';

        }
        View::redirect('/admin/users/delete');
    }
}
