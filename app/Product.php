<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'img', 'description', 'price', 'quantity', 'category_id'
    ];

    public function orderDetails(){
        return $this->hasOne(OrderDetails::class, 'product_id', 'id');
    }

    protected $table = 'products';

}
