<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_review extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function responses(){
        return $this->hasMany(Response::class,'review_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
