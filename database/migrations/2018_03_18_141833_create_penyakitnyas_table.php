<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyakitnyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyakitnya', function (Blueprint $table) {
            $table->increments('id_penyakitnya');
            $table->integer('id_penyakit')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->timestamps();

            $table->foreign('id_penyakit')
            ->references('id_penyakit')->on('penyakit')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_user')
            ->references('id')->on('users')
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
        Schema::dropIfExists('penyakitnya');
    }
}
