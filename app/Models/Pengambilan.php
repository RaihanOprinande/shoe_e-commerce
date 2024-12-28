<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;

    protected $fillable=[
        'metode',
        'ongkir'
    ];

    public function checkout(){
        return $this->belongsToMany(TransactionDetail::class,'transaction_detail','pengambilan_id','pengambilan_id');
    }
}
