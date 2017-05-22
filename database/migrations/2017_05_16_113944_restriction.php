<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Restriction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Restriction', function (Blueprint $table) {
            $table->integer('Games');
            $table->integer('CoinIn');
            $table->integer('CoinOut');
            $table->integer('BillIn');
            $table->integer('Jackpot');
            $table->integer('TicketIn');
            $table->integer('TicketOut');
            $table->integer('XtraCredit');
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
