<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail', function (Blueprint $table) {
            $table->increments('id_det');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_jk');
            $table->string('ktp');
            $table->string('golongan');
            $table->string('alamat');
            $table->integer('berat');
            $table->integer('tinggi');
            $table->date('tanggal');
            $table->string('kontak');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('id_user')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_jk')
            ->references('id_kel')->on('kelamins')
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
        Schema::dropIfExists('detail');
    }
}
