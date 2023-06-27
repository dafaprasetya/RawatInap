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
        Schema::table('invoices', function (Blueprint $table) {
            $table->char('nama_pasien')->after('kamar_id');
            $table->char('harga_kamar')->after('nama_pasien');
            $table->char('hari')->after('harga_kamar');
            $table->char('total_checkup_perhari')->after('hari');
            $table->string('obat')->after('total_checkup_perhari');
            $table->char('total_obat_perhari')->after('obat');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
};
