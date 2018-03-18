<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObatnyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obatnya', function (Blueprint $table) {
            $table->increments('id_obatnya');
            $table->unsignedInteger('id_obat');
            $table->unsignedInteger('id_riwayat');
            $table->timestamps();

             $table->foreign('id_riwayat')
            ->references('id_riwayat')->on('riwayat')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_obat')
            ->references('id_obat')->on('obat')
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
        Schema::dropIfExists('obatnya');
    }
}
