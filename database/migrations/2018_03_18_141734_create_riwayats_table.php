<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->increments('id_riwayat');
            $table->integer('id_rawat')->unsigned();
            $table->integer('id_rumah')->unsigned();
            $table->timestamps();

             $table->foreign('id_rawat')
            ->references('id_rawat')->on('rawat')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_rumah')
            ->references('id_rumah')->on('rs')
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
        Schema::dropIfExists('riwayat');
    }
}
