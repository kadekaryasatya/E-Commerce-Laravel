<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function courier(){
        return $this->belongsTo(Courier::class);
    }

    public function details(){
        return $this->hasMany(Transaction_detail::class);
    }
}
