<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberbonustranslistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memberbonustranslist', function(Blueprint $table)
		{
			$table->integer('TransNo')->primary();
			$table->string('MemberNo', 2)->nullable();
			$table->string('SectionNo', 2)->nullable();
			$table->integer('Mnum')->nullable();
			$table->string('Location', 8)->nullable();
			$table->dateTime('TransTime')->nullable();
			$table->decimal('Point', 20, 0)->nullable();
			$table->integer('PointType')->nullable();
			$table->integer('Behavior')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('memberbonustranslist');
	}

}
