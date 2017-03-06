<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaseDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Kase_id')->unsigned();
            $table->string('foto_ktp');
            $table->string('foto_stnk');
            $table->string('foto_mobil');
            $table->string('sisi1');
            $table->string('sisi2');
            $table->string('sisi3');
            $table->string('sisi4');
            $table->string('foto_dashboard');
            $table->string('foto_sim');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Kase_id')->references('id')->on('kases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('case_details');
    }
}
