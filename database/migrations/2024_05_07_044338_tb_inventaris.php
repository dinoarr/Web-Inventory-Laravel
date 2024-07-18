<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventaris_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 5)->index();
            $table->string('Nama_barang');
            $table->string('jumlah');
            $table->string('Id_jenis')->index();
            $table->date('tanggal_pembelian');
            $table->date('tanggal_pemakaian');
            $table->string('Id_ruang')->index();
            $table->string('pemakaian')->index();
            $table->string('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris_barang');
    }
};