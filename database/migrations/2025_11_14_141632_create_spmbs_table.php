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
        Schema::create('spmb', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignUuid('id_sekolah');
            $table->string('nis')->unique();
            $table->string('password');
            $table->string('biodata');
            $table->string('dokumen');
            $table->string('status')->nullable()->default('mendaftar');
            $table->string('VA')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spmb');
    }
};
