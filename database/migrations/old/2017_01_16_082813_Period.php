<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Period extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Period', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->date('Period');
            $table->integer('Mnum');
            $table->integer('MtrGames');
            $table->integer('MtrCurrentCredit');
            $table->integer('MtrTotalCoinIn');
            $table->integer('MtrTotalCoinOut');
            $table->integer('MtrTotalDrop');
            $table->integer('MtrTotalBillIn');
            $table->integer('MtrJackpot');
            $table->integer('MtrWATin');
            $table->integer('MtrWATout');
            $table->integer('MtrTicketIn');
            $table->integer('MtrTicketOut');
            $table->integer('MtrSoftDrop1');
            $table->integer('MtrSoftDrop2');
            $table->integer('MtrSoftDrop3');
            $table->integer('MtrSoftDrop4');
            $table->integer('MtrSoftDrop5');
            $table->integer('MtrSoftDrop6');
            $table->integer('MtrSoftDrop7');
            $table->integer('MtrSoftDrop8');
            $table->integer('MtrSoftDrop9');
            $table->integer('MtrSoftDrop10');
            $table->integer('MtrXtraCredit');
            $table->integer('ActJackpot');
            $table->integer('ActTotalBillIns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
