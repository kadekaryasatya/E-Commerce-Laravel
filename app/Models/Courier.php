<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courier extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    use HasFactory;
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
