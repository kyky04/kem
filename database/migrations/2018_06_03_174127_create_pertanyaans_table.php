<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePertanyaansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_soal')->unsigned();
            $table->string('pertanyaan');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('pertanyaans');
    }
}
