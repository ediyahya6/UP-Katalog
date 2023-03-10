<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_produk');
            $table->unsignedBigInteger('up_id');
            $table->string('nama_produk');
            $table->integer('harga_produk');
            $table->longText('detail_produk')->nullable();
            $table->string('kategori_produk');
            $table->enum('status_produk', ['Ready', 'Pre-Order', 'Sold out']);
            $table->integer('stok_produk')->nullable();

            $table->foreign('up_id')->references('id')
                                    ->on('unitproduksi')
                                    ->onUpdate('cascade')
                                    ->onDelete('cascade');

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
        Schema::dropIfExists('produk');
    }
}
