<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotPeriodCashflowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('slotperiodcashflow', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->date('Period')->nullable();
            $table->decimal('Coin_In',14,2)->nullable();//押分總計
            $table->decimal('Coin_Out',14,2)->nullable();//得分總計
            $table->decimal('Meter_Jackpot',14,2)->nullable();//機台紀錄jackpot
            $table->decimal('Net_Win',14,2)->nullable();//機台營收
            $table->decimal('Issue',14,2)->nullable();//總開分
            $table->decimal('Validation',14,2)->nullable();//總洗分
            $table->decimal('Void',14,2)->nullable();//贈分/回櫃使用
            $table->decimal('Handpay',14,2)->nullable();//機台紀錄handpay
            $table->decimal('Cashflow',14,2)->nullable();//機台派彩金額
            $table->decimal('Soft_Drop',14,2)->nullable();//清鈔
            $table->decimal('Total_Cash_Received',14,2)->nullable();//總收到現金
            $table->decimal('Variance',14,2)->nullable();//現金流差異
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
        Schema::drop('slotperiodcashflow');
    }
}
