<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Illuminate\Database\Capsule\Manager as Capsule;
use Models\Category;
use Throwable;

class CategoryController extends Controller
{

    public function insert()
    {
        $name = $_POST['name'];
        Category::create([
            'name'=>$name
        ]);
        $_SESSION['message'] = 'Категория успешно добавлена';
        View::redirect('/admin/categories/create');
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
            Category::where('id',$id)->update([
                'name'=>$name
            ]);
            Capsule::commit();
            $_SESSION['message'] = 'Категория успешно изменена';
        }catch (Throwable $e){
            Capsule::rollBack();
            $_SESSION['message'] = 'Ошибка:' . $e->getMessage();
        }
        View::redirect('/admin/categories/edit');
    }

    public function delete()
    {
        $id = $_POST['id'];
        Capsule::beginTransaction();
        try{
            Category::where('id',$id)->delete();
            Capsule::commit();
            $_SESSION['message'] = 'Категория успешна удалена';
        }catch (Throwable $e){
            Capsule::rollBack();
            $_SESSION['message'] = 'Ошибка:' . $e->getMessage();
            if ($e->getCode()==='23000') $_SESSION['message'] = 'Невозможно удалить. У этой категории есть объявления.';

        }
        View::redirect('/admin/categories/delete');
    }

}