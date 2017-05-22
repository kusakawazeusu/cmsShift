<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTypeGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GameTypeGroup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('GroupID', 4)->unique();      //VARCHAR 4 群組編號
            $table->string('Description', 20);                      //VARCHAR 20 說明
            $table->double('Rate', 10, 2);                          //拆帳比例
            $table->double('SubPointShareRate', 10, 2);             //下層拆帳比例，從上層中再拆出來
            $table->integer('SubPointEnable');                      //開啟下層拆帳：0:Disable(Default); 1:Enable
            $table->string('Memo', 200)->nullable();                            //備註(NULL)

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
        Schema::drop('GameTypeGroup');
    }
}
