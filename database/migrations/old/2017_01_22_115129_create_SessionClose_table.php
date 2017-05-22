<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionCloseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sessionclose', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('session');
            $table->decimal('issuance',14,2)->nullable();
            $table->decimal('void',14,2)->nullable();
            $table->decimal('redemption',14,2)->nullable();
            $table->decimal('handpay',14,2)->nullable();
            $table->decimal('net_cash_flow',14,2)->nullable();
            $table->timestamps();
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
        Schema::drop('sessionclose');

    }
}
