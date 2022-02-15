<?php

namespace Controllers;

use Core\Auth;
use Core\Controller;
use Core\View;
use Illuminate\Database\Capsule\Manager as Capsule;
use Models\Category;
use Models\City;
use Models\Post;
use Models\User;
use Throwable;

class AdminController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function index()
    {
        $this->view->render('admin/index');
    }

    public function createPost()
    {
        $this->view->render('admin/posts/create', [
            'categories' => Category::orderBy('name')->get(),
            'users' => User::orderBy('name')->get(),
            'message' => $this::getMessage()
        ]);
    }

    public function editPost()
    {
        $posts = Post::with('category')
            ->orderBy('created_at')
            ->get();
        $this->view->render('admin/posts/edit', [
            'posts' => $posts,
            'categories' => Category::orderBy('name')->get(),
            'users' => User::orderBy('name')->get(),
            'message' => $this::getMessage()
        ]);
    }

    public function createCity()
    {
        $this->view->render('admin/cities/create',[
            'message'=>self::getMessage()
        ]);
    }

    public function editCity()
    {
        $this->view->render('admin/cities/edit',[
            'cities'=>City::orderBy('name')->get(),
            'message'=>self::getMessage()
        ]);
    }

    public function deleteCity()
    {
        $this->view->render('admin/cities/delete',[
            'cities'=>City::orderBy('name')->get(),
            'message'=>self::getMessage()
        ]);
    }

    public function createUser()
    {
        $this->view->render('admin/users/create',[
            'cities'=>City::orderBy('name')->get(),
            'message'=>self::getMessage()
        ]);
    }

    public function editUser()
    {
        $this->view->render('admin/users/edit',[
            'users'=>User::orderBy('name')->get(),
            'cities'=>City::orderBy('name')->get(),
            'message'=>self::getMessage()
        ]);
    }

    public function deleteUser()
    {
        $this->view->render('admin/users/delete',[
            'users'=>User::orderBy('name')->get(),
            'message'=>self::getMessage()
        ]);
    }
}
