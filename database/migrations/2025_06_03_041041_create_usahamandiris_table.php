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
        Schema::create('usahamandiris', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('nama_barang');
            $table->string('kategori')->nullable();
            $table->decimal('harga', 10, 2)->nullable();
            $table->string('deskripsi')->nullable();
            $table->longText('foto_barang')->nullable();
            $table->longText('link_tiktok',)->nullable();
            $table->longText('link_shopee')->nullable();
            $table->longText('link_lazada')->nullable();
            $table->longText('link_tokopedia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usahamandiris');
    }
};
