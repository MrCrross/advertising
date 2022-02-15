<?php

namespace Seeders;

use Illuminate\Database\Seeder;
use Models\Category;
use Models\Post;
use Models\PostImage;

class PostSeeder extends Seeder
{
     public function run(){
         $categories = [
             [
                 'name'=>'Одежда'
             ],
             [
                 'name'=>'Автомобиль'
             ],
         ];

         $posts = [
             [
                 'title'=>'Футболка "Паучок"',
                 'description'=>'Футболка нульцевая. Ачешуительная честно говоря.',
                 'image'=>'/public/storage/images/posts/post1_image1.jpg',
                 'status'=>1,
                 'views'=>0,
                 'price'=>10000,
                 'user_id'=>2,
                 'category_id'=>1
             ]
         ];
         $post_images = [
             [
                 'post_id'=>1,
                 'image'=>'/public/storage/images/posts/post1_image2.jpg'
             ]
         ];

         foreach ($categories as $category){
             Category::create([
                 'name'=>$category["name"]
             ]);
         }
         foreach ($posts as $post){
             Post::create([
                 'title'=>$post["title"],
                 'description'=>$post["description"],
                 'image'=>$post["image"],
                 'status'=>$post["status"],
                 'views'=>$post["views"],
                 'price'=>$post["price"],
                 'user_id'=>$post["user_id"],
                 'category_id'=>$post["category_id"],
             ]);
         }
         foreach ($post_images as $post_image){
             PostImage::create([
                 'post_id'=>$post_image["post_id"],
                 'image'=>$post_image["image"],
             ]);
         }
     }
}