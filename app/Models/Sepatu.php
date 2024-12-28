<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    use HasFactory;
    protected $table = 'shoes';
    protected $fillable = ['kode_sepatu','nama', 'harga', 'kategori_id' ,'brands_id','gambar_sepatu'];

    public function sizes(){
        return $this->belongsToMany(Size::class,'sepatu_sizes','sepatu_id','size_id')->withPivot('quantity');
    }

    public function sepatus(){
        return $this->belongsToMany(Sepatu::class,'sepatu_sizes','sepatu_id','sepatu_id')->withPivot('quantity');
    }
    // public function gambars(){
    //     return $this->belongsToMany(sepatui::class,'sepatu_gambars','sepatu_id','sepatui_id');
    // }
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function brands(){
        return $this->belongsTo(Brands::class);
    }
    public function colors(){
        return $this->belongsTo(Color::class);
    }

    public function size(){
        return $this->belongsTo(Sepatu_size::class);
    }
    public function carts(){
        return $this->belongsToMany(Cart::class,'carts','sepatu_id','sepatu_id')->withPivot('quantity');
    }
    public function checkout(){
        return $this->belongsToMany(TransactionDetail::class,'transaction_details','sepatu_id','sepatu_id')->withPivot('quantity');
    }

}
