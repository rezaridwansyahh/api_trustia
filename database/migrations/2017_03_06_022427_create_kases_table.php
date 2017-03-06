<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKasesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kases', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_case');
            $table->string('no_polisi');
            $table->string('no_mesin');
            $table->string('no_rangka');
            $table->integer('merek_id')->unsigned();
            $table->string('tahun_anggaran');
            $table->string('warna');
            $table->char('status');
            $table->integer('agent_id')->unsigned();
            $table->integer('wilayah_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('merek_id')->references('id')->on('mereks');
            $table->foreign('agent_id')->references('id')->on('agents');
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
        Schema::drop('kases');
    }
}
