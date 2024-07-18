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
        Schema::create('barang', function (Blueprint $table) {
            $table->string('kode_barang',5)->nullable()->primary();
            $table->string('Nama_barang')->nullable();
            $table->integer('Id_jenis')->index();
            $table->integer('jumlah');
            $table->decimal('harga', 10, 2); 
            $table->date('tanggal_beli');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};