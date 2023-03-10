<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitproduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitproduksi', function (Blueprint $table) {
            $table->id();
            $table->string('kejuruan');
            $table->string('nama_up');
            $table->string('penanggung_jawab');
            $table->string('no_wa');
            $table->string('marketplace')->nullable();
            $table->string('link_marketplace')->nullable();
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
        Schema::dropIfExists('unitproduksi');
    }
}
