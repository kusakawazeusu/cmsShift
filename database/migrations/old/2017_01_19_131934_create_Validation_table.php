<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //櫃台兌換票據紀錄
        Schema::create('validation', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('Validation_Code',30)->unique();//Ticket號碼
            $table->dateTime('Issued')->nullable();//Ticket列印時間
            $table->string('Issued_by')->nullable();//Ticket產生之機台序號
            $table->decimal('Amount',14,2)->nullable();;//Ticket金額
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
        Schema::drop('validation');
    }
}
