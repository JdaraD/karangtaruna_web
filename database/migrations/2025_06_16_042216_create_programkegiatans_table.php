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
        Schema::create('programkegiatans', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->foreignId('program_id')->constrained('addmenukegiatans')->onDelete('cascade');
            $table->string('gambar');
            $table->text('deskripsi');
            $table->string('progres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programkegiatans');
    }
};
