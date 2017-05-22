<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Machine', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MNum', 6)->unique();       //VARCHAR 6 自行編號>100000
            $table->string('IPAddress')->unique();
            $table->string('SerialNum', 20)->unique();            //VARCHAR <8 can't change
            $table->string('Location', 6)->unique();              //VARCHAR 6 SectionName+Bank+SeqNum
            $table->string('SectionName', 2);                     //VARCHAR 2 店碼
            $table->integer('BankNo');                            //INT <100 機台排號 
            $table->integer('SeqNo');                             //INT <100 機台排序列號
            $table->integer('GameType');                          //Seletction
            $table->integer('DenomCode');                         //Seletction (has const table)
            $table->string('PayTable', 10);                       //VARCHAR 10 賠率表
            $table->integer('Status');                            //機台狀態
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
        Schema::drop('Machine');
    }
}
