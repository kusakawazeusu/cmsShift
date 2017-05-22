<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketIssuanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('TicketIssuance', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('MachineTKTSeqNo')->nullable();;//機台Ticket序號
            $table->string('Validation_Code',30)->unique();//Ticket號碼
            $table->dateTime('Issued')->nullable();//Ticket列印時間
            $table->decimal('Amount',14,2)->nullable();;//Ticket金額
            $table->string('Paid_Void_Flag')->nullable();;//付款/取消 標示
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
        Schema::drop('TicketIssuance');
    }
}
