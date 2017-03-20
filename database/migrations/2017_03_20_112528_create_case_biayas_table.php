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
        Schema::create('customer_case', function (Blueprint $table) {
            $table->integer('kase_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->primary(['kase_id','customer_id']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kase_id')->references('id')->on('kases');
            $table->foreign('customer_id')->references('id')->on('customers');
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
