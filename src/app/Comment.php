<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * このコメントを所有するポストを取得
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
