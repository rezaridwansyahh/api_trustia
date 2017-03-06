<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNopolsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nopols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_polisi');
            $table->string('daerah');
            $table->integer('wilayah_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('wilayah_id')->references('id')->on('wilayahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nopols');
    }
}
