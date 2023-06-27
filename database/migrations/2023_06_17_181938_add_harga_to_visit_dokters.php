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
        Schema::table('visit_dokters', function (Blueprint $table) {
            $table->char('harga_obat')->after('obat')->change();
            $table->char('harga_checkup')->after('harga_obat')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visit_dokters', function (Blueprint $table) {
            //
        });
    }
};
