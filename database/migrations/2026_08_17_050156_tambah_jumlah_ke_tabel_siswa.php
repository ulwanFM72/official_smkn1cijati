<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        if (!Schema::hasColumn('siswa', 'jumlah')) {
            Schema::table('siswa', function (Blueprint $table) {
                $table->unsignedInteger('jumlah')->default(0)->after('id');
            });
        }
    }


    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropColumn('jumlah');
        });
    }
};
