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
        Schema::create('visit_dokters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pasien_id')->unsigned();
            $table->bigInteger('perkembangan_pasien_id')->unsigned();
            $table->foreign('perkembangan_pasien_id')->references('id')->on('perkembangan_pasiens')->onDelete('cascade');
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->bigInteger('dokter_id')->unsigned();
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
            $table->integer('hari');
            $table->string('keluhan', 255);
            $table->string('perkembangan', 255)->default('hari pertama');
            $table->string('penyakit', 45);
            $table->string('obat', 255);
            $table->enum('rujuk', ['yes', 'no'])->default('no');
            $table->enum('selesai',['yes','no'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_dokters');
    }
};
