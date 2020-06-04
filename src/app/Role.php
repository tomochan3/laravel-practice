<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
    * IDの自動増加
    *
    * @var bool
    */
   public $incrementing = true;

    /**
     * 役目を所有するユーザー
     */
    public function users()
    {

        // return $this->belongsToMany('App\User');
        // return $this->belongsToMany('App\User')->using('App\RoleUser');
        // return $this->belongsToMany('App\User')
        //     ->using('App\RoleUser')
        //     ->withPivot([
        //         'created_by',
        //         'updated_by',
        //     ]);
    }


}
