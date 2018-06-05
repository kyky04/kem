<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_siswa')->unsigned();
            $table->integer('id_soal')->unsigned();
            $table->integer('skor');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_siswa')->references('id')->on('siswas');
            $table->foreign('id_soal')->references('id')->on('soals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skors');
    }
}
