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
        Schema::create('pengajuan_kegiatans', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('nama');
            $table->text('alamat');
            $table->string('email');
            $table->string('no_telp');
            $table->string('keperluan');
            $table->date('tanggal');
            $table->decimal('total_anggaran', 15, 2);
            $table->text('detail_Keperluan')->nullable();
            $table->string('file_path')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_kegiatans');
    }
};
