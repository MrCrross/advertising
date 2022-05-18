<?php

namespace App\Controllers;


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
        $categories = [];
        $priceStart = Post::min('price');
        $priceEnd = Post::max('price');
        $search='';
        $posts = new Post();
        $posts = $posts->with('user', 'category')
            ->where('status', '=', '1');
        if (isset($_POST['category'])) {
            $categories = $_POST['category'];
            $posts = $posts->whereIn('category_id', $categories);
        }
        if (isset($_POST['min_price'])) {
            $priceStart =$_POST['min_price'];
            $posts = $posts->where('price', ">=", $_POST['min_price']);
        }
        if (isset($_POST['max_price'])) {
            $priceEnd =$_POST['max_price'];
            $posts = $posts->where('price', "<=", $_POST['max_price']);
        }
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            $posts = $posts->where(function($query) {
                return $query->where('title', 'like', '%' . $_POST['search'] . "%")->orWhere('description', 'like', '%' . $_POST['search'] . "%");
            });
        }
        $posts = $posts->orderBy('created_at')->get();
        $this->view->render('main', [
            'posts' => $posts,
            'categories' => Category::orderBy('name')->get(),
            'min_price' => Post::min('price'),
            'max_price' => Post::max('price'),
            'priceStart'=>$priceStart,
            'priceEnd'=>$priceEnd,
            'search'=>$search,
            'check_categories' => $categories
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

    public function lk()
    {
        if (Auth::user()->role === 1) $this->view->layout = 'admin';
        $id = Auth::user()->id;
        $this->view->render('lk', [
            'user' => User::where('id', $id)->first(),
            'cities' => City::orderBy('name')->get(),
            'message' => self::getMessage()
        ]);
    }
}