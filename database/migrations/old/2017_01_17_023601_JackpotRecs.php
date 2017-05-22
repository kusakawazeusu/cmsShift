<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JackpotRecs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('JackpotRecs', function (Blueprint $table) {
            $table->increments('SeqNo')->unique();
            $table->string('JackpotID');
            $table->integer('JPGroup');
            $table->integer('JPLevel');
            $table->datetime('JPTime');
            $table->integer('EGMID');
            $table->string('Location');
            $table->decimal('JPAmount',12);
            $table->datetime('LastModifyTime');
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
