<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'product_id',
        'comment',
        'start'
    ];

    public $timestamps = false;
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
