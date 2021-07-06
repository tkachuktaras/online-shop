<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OrderDetails extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'product_id', 'quantity'
    ];

    public function orders(){
        return $this->belongsTo(Order::class, 'id', 'order_id');
    }

    public function products(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    protected $table = 'order_details';
}
