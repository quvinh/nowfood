<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = [
        'user_id',
        'fullname',
        'address',
        'phone'
    ];

    public $timestamps = false;
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
