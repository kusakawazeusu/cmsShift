<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDenomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DenomType', function (Blueprint $table) {
            $table->increments('id');
            $table->double('DenomCode', 10, 4); //VARCHAR 6 自行編號
            $table->double('DenomValue', 10, 4);           //對應實際金額    
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
        Schema::drop('DenomType');
    }
}
