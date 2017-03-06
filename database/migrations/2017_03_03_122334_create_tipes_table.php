<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tipe');
            $table->string('jenis');
            $table->integer('merek_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('merek_id')->references('id')->on('mereks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tipes');
    }
}
