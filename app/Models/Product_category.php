<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_category extends Model
{
     protected $guarded = ['id'];
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class,'category_details','category_id','product_id');
    }
    public function getRouteKeyName(){
        return 'slug';
    }


}
