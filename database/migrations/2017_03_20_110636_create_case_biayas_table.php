<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaseBiayasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_biayas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kase_id')->unsigned();
            $table->integer('harga_kendaraan');
            $table->string('jenis_pertanggungjawaban');
            $table->integer('harga_pertanggungan');
            $table->string('SRCC_status');
            $table->string('TS_Status');
            $table->String('TS_Nilai');
            $table->string('FTWD_Status');
            $table->string('FTWD_Nilai');
            $table->string('Evet_Status');
            $table->string('Evet_Nilai');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kase_id')->references('id')->on('kases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('case_biayas');
    }
}
