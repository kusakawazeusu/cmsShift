<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftDropVarianceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('softdropvariance', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('Mnum')->unique();//機台編號
            $table->string('Location')->nullable();//位置
            $table->integer('Denom')->nullable();//比例
            $table->string('Description')->nullable();//機台說明
            $table->decimal('MeterSoftDrop',14,2)->nullable();//當日機台收入紙鈔金額
            $table->decimal('ActualSoftDrop',14,2)->nullable();//實際清鈔金額
            $table->decimal('Variance',14,2)->nullable();//我不知道是什麼
            $table->decimal('Percentage',14,2)->nullable();//比例
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
        Schema::drop('softdropvariance');
    }
}
