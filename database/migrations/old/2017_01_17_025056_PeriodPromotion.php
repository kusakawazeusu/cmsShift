<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PeriodPromotion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PeriodPromotion', function (Blueprint $table) {
            $table->datetime('Period');
            $table->string('SectionNo');
            $table->integer('GroupID');
            $table->double('Promotion1',12,2);
            $table->double('Promotion2',12,2);
            $table->double('Promotion3',12,2);
            $table->double('Promotion4',12,2);
            $table->double('Promotion5',12,2);
            $table->double('Promotion6',12,2);
            $table->double('Rate',10,2);
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
