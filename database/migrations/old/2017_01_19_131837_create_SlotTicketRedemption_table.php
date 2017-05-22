<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotTicketRedemptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('SlotTicketRedemption', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('MachineTKTSeqNo')->nullable();;//機台Ticket序號
            $table->string('Validation_Code',30)->unique();//Ticket號碼
            $table->dateTime('Issued')->nullable();//Ticket列印時間
            $table->string('Issued_by')->nullable();//應該是由誰處理的
            $table->decimal('Amount',14,2)->nullable();;//Ticket金額
            $table->string('Validation_by')->nullable();//我不知道是什麼
            $table->dateTime('Paid_Date')->nullable();;//付款時間
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
        Schema::drop('SlotTicketRedemption');
    }
}
