<?php

namespace Controllers;

use Core\Auth;
use Core\Controller;
use Core\View;
use Models\Category;
use Models\Post;
use Models\PostImage;
use Illuminate\Database\Capsule\Manager as Capsule;
use Throwable;

class PostController extends Controller
{

    private $user;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'posts';
        $this->user = json_decode($_SESSION['user']);
    }

    public function index()
    {
        $posts = Post::with('category')
            ->where('user_id', $this->user->id)
            ->orderBy('created_at')
            ->orderBy('status')
            ->get();
        $this->view->render('post/index', [
            'posts' => $posts
        ]);
    }

    public function view()
    {
        if (!isset($_GET['id'])) {
            View::errors(404);
            exit;
        }
        $this->view->layout = 'app';
        $id = $_GET['id'];
        $post = Post::with('images', 'user', 'category')
            ->where('id', $id)
            ->first();
        Post::where('id', $id)->update([
            'views' => ++$post->views
        ]);
        $this->view->render('post/view', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        $this->view->render('post/create', [
            'categories' => Category::orderBy('name')->get(),
            'message' => $this::getMessage()
        ]);
    }

    public function edit()
    {
        $posts = Post::with('category')
            ->where('user_id', $this->user->id)
            ->orderBy('created_at')
            ->get();
        $this->view->render('post/edit', [
            'posts' => $posts,
            'categories' => Category::orderBy('name')->get(),
            'message' => $this::getMessage()
        ]);
    }

    public function insert()
    {
        if (!isset($_POST['title'])) {
            View::errors(404);
            exit;
        }
        $title = $_POST['title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        $images = $_FILES['images'];
        $status = 1;
        $views = 0;
        $user_id = Auth::user()->id;
        if(Auth::user()->role===1) $user_id = $_POST['user'];
        $category_id = $_POST['category'];
        $storage = $_SERVER['DOCUMENT_ROOT'] . '\public\storage\images\posts\\';
        $url = '/public/storage/images/posts/';
        $files = [];
        $address ='/posts/create';
        if(Auth::user()->role ===1) $address ='admin/posts/create';
        Capsule::beginTransaction();
        try {
            $num = 1;
            $post_id = $this::getAutoIncrement('advertising', 'posts');
            $filename = 'post' . ++$post_id . '_image' . $num . substr($image['name'], strpos($image['name'], '.'));
            if (!move_uploaded_file($image['tmp_name'], $storage . $filename)) {
                Capsule::rollBack();
                foreach ($files as $file) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . $file);
                }
                $_SESSION['message'] = 'Ошибка сохранения изображения ' . $num;
                View::redirect($address);
            }
            $files[] = $url . $filename;
            $post = Post::create([
                'title' => $title,
                'price' => $price,
                'description' => $description,
                'image' => $url . $filename,
                'status' => $status,
                'views' => $views,
                'user_id' => $user_id,
                'category_id' => $category_id,
            ]);
            if ($images['name'][0] != '') {
                for ($i = 0; $i <= count($images['name']) - 1; $i++) {
                    ++$num;
                    $filename = 'post' . $post->id . '_image' . $num . substr($images['name'][$i], strpos($images['name'][$i], '.'));
                    if (!move_uploaded_file($images['tmp_name'][$i], $storage . $filename)) {
                        Capsule::rollBack();
                        foreach ($files as $file) {
                            unlink($_SERVER['DOCUMENT_ROOT'] . $file);
                        }
                        $_SESSION['message'] = 'Ошибка сохранения изображения ' . $num . ' ' . $images['name'][$i];
                        View::redirect($address);
                    }
                    $files[] = $url . $filename;
                    PostImage::create([
                        'post_id' => $post->id,
                        'image' => $url . $filename
                    ]);
                }
            }
            Capsule::commit();
            $_SESSION['message'] = 'Объявление успешно добавлено';
            View::redirect($address);
        } catch (Throwable $e) {
            foreach ($files as $file) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $file);
            }
            Capsule::rollBack();
            $_SESSION['message'] = 'Ошибка:' . $e->getMessage();
            View::redirect($address);
        }

    }

    public function update()
    {
        if (!isset($_POST['id'])) {
            View::errors(404);
            exit;
        }
        $id = $_POST['id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        $images = $_FILES['images'];
        $status = $_POST['status'];
        $views = 0;
        $user_id = Auth::user()->id;
        if(Auth::user()->role===1) $user_id = $_POST['user'];
        $category_id = $_POST['category'];
        $storage = $_SERVER['DOCUMENT_ROOT'] . '\public\storage\images\posts\\';
        $url = '/public/storage/images/posts/';
        $files = [];
        $dataPost = [
            'title' => $title,
            'price' => $price,
            'description' => $description,
            'status' => $status,
            'views' => $views,
            'user_id' => $user_id,
            'category_id' => $category_id,
        ];
        $address ='/posts/edit';
        if(Auth::user()->role ===1) $address ='/admin/posts/edit';
        Capsule::beginTransaction();
        try {
            $post = Post::with('images')->where('id', $id)->first();
            if ($image['name'] != '') {
                $num = 1;
                unlink($_SERVER['DOCUMENT_ROOT'] . $post->image);
                $filename = 'post' . $id . '_image' . $num . substr($image['name'], strpos($image['name'], '.'));
                if (!move_uploaded_file($image['tmp_name'], $storage . $filename)) {
                    Capsule::rollBack();
                    $_SESSION['message'] = 'Ошибка сохранения изображения ' . $num;
                    View::redirect($address);
                }
                $files[] = $url . $filename;
                $dataPost['image']=$url . $filename;
            }
            $post = Post::where('id',$id)->update($dataPost);
            if ($images['name'][0] != '') {
                foreach ($post->images as $img){
                    unlink($_SERVER['DOCUMENT_ROOT'] . $img->image);
                }
                PostImage::where('post_id',$id)->delete();
                for ($i = 0; $i <= count($images['name']) - 1; $i++) {
                    ++$num;
                    $filename = 'post' . $id . '_image' . $num . substr($images['name'][$i], strpos($images['name'][$i], '.'));
                    if (!move_uploaded_file($images['tmp_name'][$i], $storage . $filename)) {
                        Capsule::rollBack();
                        foreach ($files as $file) {
                            unlink($_SERVER['DOCUMENT_ROOT'] . $file);
                        }
                        $_SESSION['message'] = 'Ошибка сохранения изображения ' . $num . ' ' . $images['name'][$i];
                        View::redirect($address);
                    }
                    $files[] = $url . $filename;
                    PostImage::create([
                        'post_id' => $post->id,
                        'image' => $url . $filename
                    ]);
                }
            }
            Capsule::commit();
            $_SESSION['message'] = 'Объявление изменено успешно';
            View::redirect($address);
        } catch (Throwable $e) {
            foreach ($files as $file) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $file);
            }
            Capsule::rollBack();
            $_SESSION['message'] = 'Ошибка:' . $e->getMessage();
            View::redirect($address);
        }
    }

    public function delete()
    {
        $id = $_POST['id'];
        $images = PostImage::where('post_id', $id)->get();
        foreach ($images as $image) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $image->image);
        }
        PostImage::where('post_id', $id)->delete();
        $post = Post::where('id', $id)->first();
        unlink($_SERVER['DOCUMENT_ROOT'] . $post->image);
        Post::where('id', $id)->delete();
    }

}