<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_transaksi');
            $table->enum('jenis_transaksi', ['Pemasukan', 'Pengeluaran']);
            // $table->integer('dana');
            $table->decimal('dana', 10, 2)->generated('ALWAYS AS (CASE WHEN jenis_transaksi = "pemasukan" THEN jumlah + NEW.dana ELSE jumlah - NEW.dana END)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi');
    }
};
