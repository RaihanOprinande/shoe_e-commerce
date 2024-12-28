<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->string('sepatu')->comment('Nama sepatu');
            $table->foreignId('size_id')->comment('Ukuran sepatu');
            $table->foreignId('brand_id')->comment('Merek sepatu');
            $table->foreignId('kategori_id')->comment('Kategori sepatu');
            $table->integer('harga')->comment('Harga sepatu');
            $table->integer('quantity')->comment('Jumlah sepatu');
            $table->integer('uang');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
