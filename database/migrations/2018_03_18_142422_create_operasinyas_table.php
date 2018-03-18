<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperasinyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operasinya', function (Blueprint $table) {
            $table->increments('id_operasinya');
            $table->integer('id_operasi')->unsigned();
            $table->integer('id_riwayat')->unsigned();
            $table->timestamps();

            $table->foreign('id_operasi')
            ->references('id_operasi')->on('operasi')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_riwayat')
            ->references('id_riwayat')->on('riwayat')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operasinya');
    }
}
