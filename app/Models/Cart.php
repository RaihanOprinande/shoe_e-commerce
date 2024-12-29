<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = [
        'customer_id',
        'sepatu_id',
        'size_id',
        'quantity',
    ];

    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function sepatus(){
        return $this->belongsTo(Sepatu::class,'sepatu_id');
    }
    public function sizes(){
        return $this->belongsTo(Size::class,'size_id');
    }

}
