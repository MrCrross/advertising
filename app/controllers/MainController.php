<?php

namespace Controllers;

use Core\Auth;
use Core\Controller;
use Core\View;
use Models\Category;
use Models\City;
use Models\Post;
use Models\User;

class MainController extends Controller
{

    /**
     *
     */
    public function index()
    {
        $this->view->render('main', [
            'posts' => Post::with('user', 'category')
                ->where('status','=','1')
                ->orderBy('created_at')
                ->get(),
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    /**
     * Вывод объявлений только одной категории
     * Из Get получает id категории
     * Возвращает представление main с постами это категории и всеми категориями
     */
    public function view()
    {
        $category = $_GET['id'];
        $posts = Post::with('images', 'user', 'category')
            ->where('category_id', $category)
            ->orderBy('created_at')
            ->get();
        $this->view->render('main', [
            'posts' => $posts,
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    public function lk(){
        $id=Auth::user()->id;
        $this->view->render('lk',[
            'user'=>User::where('id',$id)->first(),
            'cities'=>City::orderBy('name')->get(),
            'message'=>self::getMessage()
        ]);
    }
}