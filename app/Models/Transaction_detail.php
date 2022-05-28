<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction_detail extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
