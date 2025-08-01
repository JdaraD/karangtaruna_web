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
        Schema::create('sosialmedia', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('logo');
            $table->string('judul');
            $table->string('nama_akun');
            $table->string('link_aplikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sosialmedia');
    }
};
