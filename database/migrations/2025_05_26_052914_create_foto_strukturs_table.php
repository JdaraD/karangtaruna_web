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
        Schema::create('foto_strukturs', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('foto_struktur')->nullable();
            $table->string('description', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_strukturs');
    }
};
