<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlayerSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PlayerSession', function (Blueprint $table) {
            $table->integer('SessionNo');
            $table->string('SectionNo');
            $table->double('TotalPointAdd',10,2);
            $table->double('TotalPointSub',10,2);
            $table->double('TotalXtraAdd',10,2);
            $table->double('TotalXtraSub',10,2);
            $table->date('SessionDate');
            $table->datetime('OpenTime');
            $table->datetime('CloseTime');
            $table->boolean('Accept');
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
    }
}
