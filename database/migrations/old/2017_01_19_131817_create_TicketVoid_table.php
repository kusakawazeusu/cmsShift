<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketVoidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ticketvoid', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('Validation_Code',30)->unique();//Ticket號碼
            $table->dateTime('Issued')->nullable();//Ticket列印時間
            $table->string('Issued_by')->nullable();//應該是由誰列印吧!?
            $table->decimal('Amount',14,2)->nullable();;//Ticket金額
            $table->dateTime('Void_date')->nullable();;//作廢時間
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

        Schema::drop('ticketvoid');
    }
}
