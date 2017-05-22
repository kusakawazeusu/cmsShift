<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Handpay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Handpay', function (Blueprint $table) {
            $table->increments('SeqNo')->unique();
            $table->integer('MNum');
            $table->integer('Location');
            $table->datetime('HandpayTime');
            $table->integer('Amount');
            $table->integer('ActAmount');
            $table->integer('PartialAmount');
            $table->integer('ProgressiveGroup');
            $table->integer('ProgressiveLevel');
            $table->integer('Status');
            $table->integer('Type');
            $table->integer('OverrideFlag');
            $table->integer('OperatorID');
            $table->datetime('OperatorModifyTime');
            $table->integer('Variance');
            $table->integer('SessionNo');
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
