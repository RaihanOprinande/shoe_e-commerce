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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('harga');
            $table->foreignId('kategori_id');
            $table->foreignId('gambar_id');
            $table->foreignId('merek_id');
            $table->foreignId('color_id');
            $table->foreignId('size_id');
            $table->char('jumlah');
            $table->char('total');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
