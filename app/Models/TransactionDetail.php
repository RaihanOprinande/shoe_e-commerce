<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'sepatu_id',
        'size_id',
        'quantity',
        'tanggal',
        'pengambilan_id',
        'harga_ongkir',

    ];

    public function sepatus(){
        return $this->belongsTo(Sepatu::class,'sepatu_id');
    }

    public function sizes(){
        return $this->belongsTo(Size::class,'size_id');
    }

    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function pengambilan(){
        return $this->belongsTo(Pengambilan::class,'pengambilan_id');
    }

}
