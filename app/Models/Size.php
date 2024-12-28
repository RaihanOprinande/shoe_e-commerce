<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    protected $fillable = ['size'];

    public function sepatu(){
        return $this->belongsToMany(Sepatu::class,'sepatu_sizes', 'size_id','sepatu_id')->withPivot('quantity');
    }

    public function carts(){
        return $this->belongsToMany(Cart::class,'carts','size_id','size_id')->withPivot('quantity');
    }

    public function checkout(){
        return $this->belongsToMany(TransactionDetail::class,'transaction_details','size_id','size_id')->withPivot('quantity');
    }
}
