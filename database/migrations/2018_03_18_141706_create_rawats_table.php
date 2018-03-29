<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat', function (Blueprint $table) {
            $table->increments('id_rawat');
            $table->integer('id_rumah')->unsigned();
            $table->integer('id_riwayat')->unsigned();
            $table->date('masuk');
            $table->date('keluar');
            $table->timestamps();

            $table->foreign('id_rumah')
            ->references('id_rumah')->on('rs')
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
        Schema::dropIfExists('rawat');
    }
}
