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
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->bigInteger('nss')->nullable();
            $table->bigInteger('npsn')->nullable();
            $table->foreignUuid('id_sekolah')->nullable();
            $table->text('alamat_jalan')->nullable();
            $table->text('alamat_kelurahan')->nullable();
            $table->text('alamat_kecamatan')->nullable();
            $table->text('alamat_kota')->nullable();
            $table->text('alamat_provinsi')->nullable();
            $table->text('alamat_kode_pos')->nullable();
            $table->string('nama_kepsek')->nullable();
            $table->string('gambar_kepsek')->nullable();
            $table->string('sk_izin_operasional')->nullable();
            $table->string('tanggal_izin_operasional')->nullable();
            $table->text('visi_sekolah')->nullable();
            $table->text('misi_sekolah')->nullable();
            $table->text('kata_sambutan_kepsek')->nullable();
            $table->string('akreditasi')->nullable();
            $table->string('jumlah_guru')->nullable();
            $table->string('jumlah_guru_sertifikasi')->nullable();
            $table->string('pendik_akhir_guru')->nullable();
            $table->string('prestasi_akademik')->nullable();
            $table->string('prestasi_non_akademik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
