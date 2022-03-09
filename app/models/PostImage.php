<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = [
        'image',
        'post_id'
    ];

    public function posts (){
        return $this->belongsTo(Post::class);
    }
}