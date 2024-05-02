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
        Schema::create('info_tokos', function (Blueprint $table) {
            $table->id();
            $table->text('no_whatsapp');
            $table->text('akun_ig');
            $table->text('akun_fb');
            $table->text('akun_tiktok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_tokos');
    }
};
