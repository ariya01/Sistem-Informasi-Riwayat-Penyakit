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
            $table->unsignedInteger('id_waktunya');
            $table->string('S');
            $table->string('P');
            $table->string('O');
            $table->string('K');
            $table->timestamps();

            $table->foreign('id_waktunya')
            ->references('id_waktu')->on('waktu')
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
