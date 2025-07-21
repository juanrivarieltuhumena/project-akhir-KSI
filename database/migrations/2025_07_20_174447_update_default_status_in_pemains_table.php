<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pemains', function (Blueprint $table) {
            $table->enum('status', ['Aktif', 'Cadangan', 'Cedera'])
                ->default('Aktif')
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('pemains', function (Blueprint $table) {
            $table->enum('status', ['Aktif', 'Cadangan', 'Cedera'])
                ->change(); // Hapus default kalau rollback
        });
    }
};
