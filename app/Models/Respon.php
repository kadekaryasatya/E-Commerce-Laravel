<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Respon extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function  review(){
        return $this->belongsTo(ProductReview::class,'review_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
