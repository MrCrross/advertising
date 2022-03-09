<?php

namespace  App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\City;
use Illuminate\Database\Capsule\Manager as Capsule;
use Throwable;

class CityController extends Controller
{

    public function insert()
    {
        $name = $_POST['name'];
        City::create([
            'name'=>$name
        ]);
        $_SESSION['message'] = 'Город успешно добавлен';
        View::redirect('/admin/cities/create');
    }

    public function update()
    {
        if (!isset($_POST['id'])) {
            View::errors(404);
            exit;
        }
        $id = $_POST['id'];
        $name = $_POST['name'];
        Capsule::beginTransaction();
        try{
            City::where('id',$id)->update([
                'name'=>$name
            ]);
            Capsule::commit();
            $_SESSION['message'] = 'Город успешно изменен';
        }catch (Throwable $e){
            Capsule::rollBack();
            $_SESSION['message'] = 'Ошибка:' . $e->getMessage();
        }
        View::redirect('/admin/cities/edit');
    }

    public function delete()
    {
        $id = $_POST['id'];
        Capsule::beginTransaction();
        try{
            City::where('id',$id)->delete();
            Capsule::commit();
            $_SESSION['message'] = 'Город успешно удален';
        }catch (Throwable $e){
            Capsule::rollBack();
            $_SESSION['message'] = 'Ошибка:' . $e->getMessage();
            if ($e->getCode()==='23000') $_SESSION['message'] = 'Невозможно удалить. Некоторые пользователи из этого города.';

        }
        View::redirect('/admin/cities/delete');
    }

}