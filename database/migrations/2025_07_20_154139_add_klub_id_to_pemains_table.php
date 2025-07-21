<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pemains', function (Blueprint $table) {
            if (!Schema::hasColumn('pemains', 'klub_id')) {
                $table->foreignId('klub_id')->constrained()->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pemains', function (Blueprint $table) {
            $table->dropForeign(['klub_id']);
            $table->dropColumn('klub_id');
        });
    }
};
