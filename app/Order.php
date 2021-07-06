<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }

    protected $table = 'orders';
}
