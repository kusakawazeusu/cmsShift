<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GameType', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('GameID')->unique();         //遊戲類別編號(1,2,3,…等編號）
            $table->string('GameDesc', 50);                         //遊戲說明（遊戲名稱）
            $table->integer('GroupId');                             //遊戲類別群組（下拉式選單，由『新增遊戲類別群組』中來設定）
            $table->integer('RewardPoint');                         //回饋押注點數 (default=0)
            $table->integer('RewardRate');                          //回饋押注比例 (多少押注可得多少點回饋押注點數，default=0)
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
        Schema::drop('GameType');
    }
}
