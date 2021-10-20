<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'image',
        'description'
    ];
    public $timestamp = false;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
