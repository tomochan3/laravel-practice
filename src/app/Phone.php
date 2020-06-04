<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /**
     * この電話を所有するUserを取得
     */
    public function user()
    {
        return $this->belongsTo('App\User');

        // return $this->belongsTo('App\User', 'foreign_key');

        // return $this->belongsTo('App\User', 'foreign_key', 'other_key');

        return $this->belongsToMany('App\User')
                ->as('subscription')
                ->withTimestamps();
    }

}
