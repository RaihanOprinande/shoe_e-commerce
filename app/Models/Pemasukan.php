<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukans';

    // Tentukan kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'sepatu_id',
        'size_id',
        'total_harga',
        'quantity',
        'tanggal',
        'harga',
    ];
    protected $casts = [
        'tanggal' => 'datetime',  // pastikan kolom tanggal diperlakukan sebagai Carbon instance
    ];

    // Relasi dengan model Sepatu
    public function sepatus()
    {
        return $this->belongsTo(Sepatu::class, 'sepatu_id');
    }
    public function sizes(){
        return $this->belongsTo(Size::class,'size_id');
    }
    public function pengambilans(){
        return $this->belongsTo(Pengambilan::class,'pengambilan_id');
    }
}
