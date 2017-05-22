<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('event',function($table){
            $table->increments('id')->nullable();//流水號
            $table->string('data')->nullable();//封包資訊
            $table->integer('handled')->nullable();//標記是否已經處理
            $table->dateTime('date')->nullable();//時間戳記
            $table->string('sourceIP')->nullable();//來源IP
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
        Schema::drop('event');
    }

}
