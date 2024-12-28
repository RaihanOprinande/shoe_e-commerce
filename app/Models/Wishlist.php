<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'sepatu_id'];

    public function sepatus()
    {
        return $this->belongsTo(Sepatu::class, 'sepatu_id');
    }

    public function customers()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
