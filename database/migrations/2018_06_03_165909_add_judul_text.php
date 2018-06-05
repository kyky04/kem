<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJudulText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('soals', function($table) {
        $table->string('judul');
        $table->integer('jumlah_kata');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soals', function($table) {
        $table->dropColumn('judul');
        $table->dropColumn('jumlah_kata');
    });
    }
}
