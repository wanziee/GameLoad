<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_id',20)->unique();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('username')->nullable();
            $table->string('email');
            $table->string('id_game_user')->nullable();
            $table->string('nama_game');
            $table->integer('harga_diamond');
            $table->string('metode_pembayaran');
            $table->string('jumlah_diamond');
            $table->enum('status',['UNPAID', 'PAID']);
            $table->timestamps(); // otomatis membuat created_at dan updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
