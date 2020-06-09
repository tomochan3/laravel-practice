<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * ユーザーのファーストネームを取得
     *
     * @param  string  $value
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * ユーザーのファーストネームを設定
     *
     * @param  string  $value
     * @return void
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }

    /**
     * 日付を変形する属性
     *
     * @var array
     */
    protected $dates = [
        'seen_at',
    ];

    // /**
    //  * ネイティブなタイプへキャストする属性
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'is_admin' => 'boolean',
    // ];

    // /**
    //  * ネイティブなタイプへキャストする属性
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'options' => 'array',
    // ];

    /**
     * ネイティブのタイプへキャストする属性
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
}
