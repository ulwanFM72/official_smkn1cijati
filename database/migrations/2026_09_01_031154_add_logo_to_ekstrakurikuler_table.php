
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('ekstrakurikuler', 'logo')) {
            Schema::table('ekstrakurikuler', function (Blueprint $table) {
                $table->string('logo')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('ekstrakurikuler', 'logo')) {
            Schema::table('ekstrakurikuler', function (Blueprint $table) {
                $table->dropColumn('logo');
            });
        }
    }
};
