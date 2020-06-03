<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{

    use SoftDeletes;
    /**
     * 複数代入する属性
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'flights';

    /**
     * テーブルの主キー
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * IDが自動増分されるか
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * 自動増分IDの「タイプ」
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * モデルのタイムスタンプを更新するかの指示
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * モデルの日付カラムの保存フォーマット
     *
     * @var string
     */
    protected $dateFormat = 'U';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'deleted_at';

    /**
     * モデルで使用するコネクション名
     *
     * @var string
     */
    // protected $connection = 'connection-name';

    /**
     * 属性に対するモデルのデフォルト値
     *
     * @var array
     */
    protected $attributes = [
        'delayed' => false,
    ];

    /**
     * 複数代入しない属性
     *
     * @var array
     */
    // protected $guarded = ['price'];
    // 全属性を複数代入可能にする場合
    protected $guarded = [];

}
