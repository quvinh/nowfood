<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable = [
        'order_id',
        'payment',
        'create_at',
        'status'
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
