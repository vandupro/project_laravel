<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'desc', 'content', 'cate_id', 'branch_id', 'status'];

    public function category(){
        return $this->belongsTo(Category::class, 'cate_id');
    }
    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    // public function order_details(){
    //     return $this->hasMany(Order_detail::class, 'product_id');
    // }
    public function galleries(){
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}
