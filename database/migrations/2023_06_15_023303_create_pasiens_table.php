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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 17);
            $table->string('nama_pasien', 45);
            $table->char('no_hp', 13);
            $table->string('alamat', 45);
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->bigInteger('kamar_id')->unsigned()->nullable();
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
            $table->date('tgl_masuk');
            $table->enum('gol_darah',['A','AB','B','O']);
            $table->string('pekerjaan', 25);
            $table->enum('warga_negara', ['WNA', 'WNI']);
            $table->enum('status', ['menikah', 'belum menikah']);
            $table->string('nama_kk', 45);
            $table->string('pekerjaan_kk', 25);
            $table->string('nama_penanggung_jwb', 45);
            $table->char('nomor_penanggung_jwb', 13);
            $table->enum('keluar', ['yes', 'no'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
