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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sepatu');
            $table->string('nama');
            $table->char('harga');
            $table->char('total');
            $table->foreignId('kategori_id');
            $table->foreignId('gambar_id');
            $table->foreignId('merek_id');
            $table->foreignId('color_id');
            $table->foreignId('size_id');
            $table->char('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
