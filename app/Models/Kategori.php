<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $fillable = ['nama'];

    public function sepatu(){
        return $this->hasMany(Sepatu::class);
    }

    public function checkout(){
        return $this->hasMany(TransactionDetail::class,'kategori_id','');
    }

}
