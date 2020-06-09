<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    /**
     * モデルの日付カラムの保存形式
     *
     * @var string
     */
    protected $dateFormat = 'U';
}
