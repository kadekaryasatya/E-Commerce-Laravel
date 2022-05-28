<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_image extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
