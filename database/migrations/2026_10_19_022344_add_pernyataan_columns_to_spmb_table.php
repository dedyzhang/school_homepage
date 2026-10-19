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
        Schema::table('spmb', function (Blueprint $table) {
            $table->boolean('pernyataan_setuju')->default(false)->after('keterangan');
            $table->string('nama_penyetuju')->nullable()->after('pernyataan_setuju');
            $table->timestamp('tanggal_pernyataan')->nullable()->after('nama_penyetuju');
            $table->longText('isi_pernyataan')->nullable()->after('tanggal_pernyataan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spmb', function (Blueprint $table) {
            $table->dropColumn(['pernyataan_setuju', 'nama_penyetuju', 'tanggal_pernyataan', 'isi_pernyataan']);
        });
    }
};
