<?php

namespace  App\Controllers;



use App\Core\Auth;
use App\Core\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Post;
use App\Models\User;

class MainController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);

    }

    /**
     *
     */
    public function index()
    {
//        if(Auth::check() and Auth::user()->role===1) View::redirect('/admin');
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
        if(Auth::user()->role===1) $this->view->layout='admin';
        $id=Auth::user()->id;
        $this->view->render('lk',[
            'user'=>User::where('id',$id)->first(),
            'cities'=>City::orderBy('name')->get(),
            'message'=>self::getMessage()
        ]);
    }
}