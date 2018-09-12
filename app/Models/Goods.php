<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';

    protected $fillable = [
        'cat_id',
        'goods_sn',
        'goods_name',
    ];

    public static function createModel()
    {
        $self = new static();
        $model = $self->create(request()->all());

        return $model;
    }
}
