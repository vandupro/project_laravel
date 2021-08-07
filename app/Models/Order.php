<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function ship(){
        return $this->belongsTo(Ship::class, 'ship_id');
    }
    public function payment(){
        return $this->belongsTo(Payment::class, 'payment_id');
    }
    public function products(){
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id')
                    ->withPivot('product_quantity', 'product_price');;
    }
}
