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
        Schema::create('dataanggotas', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('name', 100)->nullable();   
            $table->string('image', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('jabatan')->nullable();
            $table->string('keterangan_jabatan')->nullable();
            $table->string('no_hp', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataanggotas');
    }
};
