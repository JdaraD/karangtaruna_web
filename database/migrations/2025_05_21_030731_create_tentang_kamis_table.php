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
        Schema::create('tentang_kamis', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('first_name', 1000);
            $table->string('last_name', 1000);
            $table->string('description', 1000);
            $table->string('foto_profil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kamis');
    }
};
