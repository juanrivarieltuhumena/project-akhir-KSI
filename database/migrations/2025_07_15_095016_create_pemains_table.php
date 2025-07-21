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
        Schema::create('pemains', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('posisi');
            $table->integer('nomor_punggung');
            $table->foreignId('klub_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['Aktif', 'Cadangan', 'Cedera'])->default('Aktif');
            $table->text('gaji_encrypted');
            $table->text('kontak_encrypted');            
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemains');
    }
};
