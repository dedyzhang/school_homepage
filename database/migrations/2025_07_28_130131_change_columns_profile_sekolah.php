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
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('gambar_sekolah')->after('gambar_kepsek')->nullable();
            $table->text('deskripsi')->after('tanggal_izin_operasional')->nullable();
            $table->text('jumlah_siswa')->after('akreditasi')->nullable();
            $table->text('maps')->after('alamat_kode_pos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('gambar_sekolah');
            $table->dropColumn('deskripsi');
            $table->dropColumn('jumlah_siswa');
            $table->dropColumn('maps');
        });
    }
};
