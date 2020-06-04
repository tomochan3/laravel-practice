<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * ユーザーに関連する電話レコードを取得
     */
    public function phone()
    {
        return $this->hasOne('App\Phone');

        // return $this->hasOne('App\Phone', 'foreign_key');

        // return $this->hasOne('App\Phone', 'foreign_key', 'local_key');

        $comment = App\Comment::find(1);

        echo $comment->post->title;
    }

    /**
     * userに所属する役目を取得
     */
    public function roles()
    {
        // return $this->belongsToMany('App\Role');
        return $this->belongsToMany('App\Role', 'role_user');
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany('App\Role')->withPivot('column1', 'column2');
        return $this->belongsToMany('App\Role')->withTimestamps();
        return $this->belongsToMany('App\Podcast')
                ->as('subscription')
                ->withTimestamps();
    }

    /**
     * このコメントを所有するポストを取得
     */
    public function post()
    {
        return $this->belongsTo('App\Post', 'foreign_key');

        return $this->belongsTo('App\Post', 'foreign_key', 'other_key');
    }
}
