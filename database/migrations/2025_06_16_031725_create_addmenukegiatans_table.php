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
        Schema::create('addmenukegiatans', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('nama_program',255);
            $table->string('gambar',255);
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addmenukegiatans');
    }
};
