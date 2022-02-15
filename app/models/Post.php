<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'views',
        'price',
        'user_id',
        'category_id'
    ];

    public function images(){
        return $this->hasMany(PostImage::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getStatus($status){
        switch ($status){
            case 1:
                return 'Выставлено';
                break;
            case 2:
                return 'Продано';
                break;
        }
    }
}