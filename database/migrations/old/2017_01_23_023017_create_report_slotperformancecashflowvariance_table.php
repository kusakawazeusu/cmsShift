<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportSlotperformancecashflowvarianceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('report_slotperformancecashflowvariance', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('Mnum')->unique();//機台編號
            $table->string('Location')->nullable();//機台編號
            $table->decimal('Denom',10,2)->nullable();//比例
            $table->string('Description')->nullable();//機台說明
            $table->decimal('Coin_In',14,2)->nullable();//押分總計
            $table->decimal('Coin_Out',14,2)->nullable();//得分總計
            $table->decimal('Xcredit',14,2)->nullable();//贈分/回櫃使用
            $table->decimal('Meter_Handpay',14,2)->nullable();//機台紀錄handpay
            $table->decimal('Meter_Jackpot',14,2)->nullable();//機台紀錄jackpot
            $table->decimal('Progressive',14,2)->nullable();//機台派彩金額
            $table->decimal('Actual_Handpay',14,2)->nullable();//現場實際HandPay
            $table->decimal('Soft_Drop',14,2)->nullable();//清鈔
            $table->decimal('Net_Win',14,2)->nullable();//機台營收
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
        Schema::drop('report_slotperformancecashflowvariance');
    }
}
