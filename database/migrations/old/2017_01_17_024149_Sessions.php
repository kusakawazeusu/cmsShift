<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sessions', function (Blueprint $table) {
            $table->increments('SessionNo')->unique();
            $table->date('SessionDate');
            $table->datetime('SessionOpen');
            $table->datetime('SessionClose');
            $table->integer('OpenBy');
            $table->integer('ClodeBy');
            $table->string('SectionName');
            $table->double('SystemTKTPaid',14,2);
            $table->integer('SystemTKTIssued');
            $table->integer('SystemTKTVoid');
            $table->integer('ActualTKTPaid');
            $table->integer('ActualTKTIssued');
            $table->integer('ActualTKTVoid');
            $table->integer('VarianceAmt');
            $table->datetime('LastModifyTime');
            $table->integer('TKTTransSeqNo');
            $table->integer('Status');
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
