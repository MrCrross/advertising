<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;
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

    public function createCategory()
    {
        $this->view->render('admin/categories/create',[
            'message'=>self::getMessage()
        ]);
    }

    public function editCategory()
    {
        $this->view->render('admin/categories/edit',[
            'categories'=>Category::orderBy('name')->get(),
            'message'=>self::getMessage()
        ]);
    }

    public function deleteCategory()
    {
        $this->view->render('admin/categories/delete',[
            'categories'=>Category::orderBy('name')->get(),
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
