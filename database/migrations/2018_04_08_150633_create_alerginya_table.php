<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlerginyaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerginya', function (Blueprint $table) {
            $table->increments('id_alerginya');
            $table->integer('id_alergi')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->timestamps();

            $table->foreign('id_user')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_alergi')
            ->references('id_alergi')->on('alergi')
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
        Schema::dropIfExists('alerginya');
    }
}
