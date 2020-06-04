<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * ブログポストのコメントを取得
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');

        // return $this->hasMany('App\Comment', 'foreign_key');

        // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }



}
