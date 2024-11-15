<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'orders';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'sepatu_id',
        'harga',

        'color_id',
        'size_id',
        'jumlah',
        'total',
        'bukti',
        'status',
    ];

    public function getStatusTextAttribute()
    {
        return $this->status === 'pending' ? 'Pesanan Sedang Dibuat' : 'Pesanan Sukses';
    }

    public function sepatu()
    {
        return $this->belongsTo(Sepatu::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
}
