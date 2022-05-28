<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function images(){
        return $this->hasMany(Product_Image::class);
    }
    public function categories(){
        return $this->belongsToMany(ProductCategory::class,'category_details','product_id','category_id')->withTrashed();
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function reviews(){
        return $this->hasMany(ProductReview::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function discounts(){
        return $this->hasMany(Discount::class);
    }

    public function detailTransactions(){
        return $this->hasMany(TransactionDetail::class);
    }
}
