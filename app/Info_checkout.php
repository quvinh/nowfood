<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info_checkout extends Model
{
    protected $table = 'info_checkouts';
    protected $fillable = [
        'user_id',
        'name_product',
        'image_product',
        'quantity',
        'pay'
    ];
}
