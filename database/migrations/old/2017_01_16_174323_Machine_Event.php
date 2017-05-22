<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class machineevent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_event', function (Blueprint $table) {
            $table->increments('SeqNo(Seed)');                  //流水號
            $table->integer('Mnum');                            //機台編號
            $table->integer('EventId');                         //事件代碼（參考EventCodes）
            $table->dateTime('EventTime');                      //事件發生時間
            $table->string('PlayerId', 20);                     //會員編號
            $table->integer('MtrGames');                        //累積遊戲場數
            $table->integer('MtrGameWon');                      //累積遊戲贏的場數
            $table->decimal('MtrCurrentCredit', 14, 2);         //機台目前分數credit
            $table->decimal('MtrTotalCoinIn', 14, 2);           //累積總押分(Total Money Played)
            $table->decimal('MtrTotalCoinOut', 14, 2);          //累積總得分 (Total Money Won)
            $table->decimal('MtrTotalDrop', 14, 2);             //累積機台總收入金額(Total Money In)
            $table->decimal('MtrTotalBillIns', 14, 2);          //累積機台收入紙鈔金額
            $table->decimal('MtrJackpot', 14, 2);               //累積機台彩金金額
          //$table->decimal('MtrCreditPay', 14, 2);             //累積機台Cancel Credit Handpay金額
          //$table->decimal('MtrProgressive', 14, 2);           //累積機台Progressive Handpay金額
            $table->decimal('MtrWATin', 14, 2);                 //累積會員卡到機台金額(會員卡上分到機台)
            $table->decimal('MtrWATout', 14, 2);                //累積機台到會員卡金額(機台下分到會員卡)
            $table->decimal('MtrTicketIn', 14, 2);              //累積機台票入金額
            $table->decimal('MtrTicketOut', 14, 2);             //累積機台票出金額
          //$table->decimal('MtrTrueCoinIn', 14, 2);            //累積機台入代幣金額
          //$table->decimal('MtrTrueCoinOut', 14, 2);           //累積機台退代幣金額
            //-----累積此類別紙鈔張數----------
            $table->decimal('MtrSoftDrop1', 14, 2);
            $table->decimal('MtrSoftDrop2', 14, 2);
            $table->decimal('MtrSoftDrop3', 14, 2);
            $table->decimal('MtrSoftDrop4', 14, 2);
            $table->decimal('MtrSoftDrop5', 14, 2);
            $table->decimal('MtrSoftDrop6', 14, 2);
            $table->decimal('MtrSoftDrop7', 14, 2);
            $table->decimal('MtrSoftDrop8', 14, 2);
            $table->decimal('MtrSoftDrop9', 14, 2);
            $table->decimal('MtrSoftDrop10', 14, 2);
            //----------累積此類別紙鈔張數----------
            $table->decimal('MtrXtraCredit', 14, 2);            //累積機台額外點數(外贈/促銷)使用金額
          //$table->decimal('MtrNonDedubtibeBonus', 14, 2);     //累積未稅紅利贈獎金額
          //$table->decimal('MtrDedubtibleBo', 14, 2);          //累積應稅紅利贈獎金額
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('machine_event');
    }
}
