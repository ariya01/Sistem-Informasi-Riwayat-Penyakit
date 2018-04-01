<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->increments('id_dokter');
            $table->integer('id_user')->unsigned();
            $table->integer('id_strata')->unsigned();
            $table->integer('id_univ')->unsigned();
            $table->integer('id_pendidikan')->unsigned();
            $table->integer('id_spesialis')->unsigned()->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('id_user')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_strata')
            ->references('id_strata')->on('strata')
            ->onDelete('cascade')->onUpdate('cascade');

             $table->foreign('id_univ')
            ->references('id_univ')->on('univ')
            ->onDelete('cascade')->onUpdate('cascade');

             $table->foreign('id_pendidikan')
            ->references('id_pendidikan')->on('pendidikan')
            ->onDelete('cascade')->onUpdate('cascade');

             $table->foreign('id_spesialis')
            ->references('id_spesialis')->on('spesialis')
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
        Schema::dropIfExists('dokter');
    }
}
