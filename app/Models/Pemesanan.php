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
        'customer_id',
        'sepatu_id',
        'size_id',
        'tanggal',
        'pengambilan_id',
        'harga_ongkir',
        'quantity',
        'bukti_transaksi',
        'status'
    ];

    public function getStatusTextAttribute()
    {
        return $this->status === 'pending' ? 'Pesanan Sedang Dibuat' : 'Pesanan Sukses';
    }

    public function sepatus()
    {
        return $this->belongsTo(Sepatu::class,'sepatu_id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function customers()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function merek(){
        return $this->belongsTo(Brands::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
}
