<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // tabel order untuk menyimpan data order
        Schema::create('charts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users');
            $table->integer('total_harga');
            $table->string('status');
            $table->string('userEmail');
            $table->string('buktiTransfer');
            $table->timestamps();
        });

        // tabel pivot untuk menyimpan relasi antara order dan produk
        // Schema::create('order_produk', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('order_id')->constrained('orders');
        //     $table->foreignId('produk_id')->constrained('produks');
        //     $table->integer('harga');
        //     $table->string('nama_produk');
        //     $table->integer('jumlah');
        //     $table->timestamps();
        // });
    }

    public function down(): void
    {
        // Schema::dropIfExists('order_produk');
        Schema::dropIfExists('orders');
    }
};