<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvancereportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advancereport', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('SeqNo')->unique();//編號
            $table->string('ReportName', 30);//報表名稱
            $table->integer('Favorite');//是否為常用報表
            $table->string('ReportDesc',200);//報表說明(NULL):0:NO1:YES !!!!
            $table->string('ReportFile',200);//報表檔名
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
        Schema::drop('advancereport');
    }
}
