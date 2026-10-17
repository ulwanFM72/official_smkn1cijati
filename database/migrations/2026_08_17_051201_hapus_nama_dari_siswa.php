<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('siswa', 'nama')) {
            Schema::table('siswa', function (Blueprint $table) {
                $table->dropColumn('nama');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('siswa', 'nama')) {
            Schema::table('siswa', function (Blueprint $table) {
                $table->string('nama')->nullable();
            });
        }
    }
};
