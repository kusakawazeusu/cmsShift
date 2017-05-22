<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MemberCashlessTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MemberCashlessTrans', function (Blueprint $table) {
            $table->increments('TransNo')->unique();
            $table->string('MemberNo');
            $table->string('SectionNo');
            $table->string('SessionNo');
            $table->datetime('TransTime');
            $table->integer('OperatorID');
            $table->integer('TransType');
            $table->integer('Amount');
            $table->integer('OldBalance');
            $table->integer('NewBalance');
            $table->string('Location');
            $table->integer('Success');
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
