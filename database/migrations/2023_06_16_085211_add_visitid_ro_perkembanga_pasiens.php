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
        Schema::table('perkembangan_pasiens', function (Blueprint $table) {
            $table->bigInteger('visit_dokter_id')->unsigned()->nullable();
            $table->foreign('visit_dokter_id')->references('id')->on('visit_dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perkembangan_pasiens', function (Blueprint $table) {
            //
        });
    }
};
