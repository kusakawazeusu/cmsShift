<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OperatorGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OperatorGroup', function (Blueprint $table) {
            $table->increments('GroupID');
            $table->string('GroupName');
            $table->boolean('Active');
            $table->decimal('MaxTKTIssueAmount',18);
            $table->decimal('MaxTKTValidAmount',18);
            $table->decimal('MaxTKTVoidAmount',18);
            $table->decimal('MaxTKTOverrideLimitAmount',18);
            $table->decimal('XtraCreditAdd',18);
            $table->integer('RewardPointAdd');
            $table->decimal('XtraCreditSub',18);
            $table->integer('RewardPointSub');
            $table->boolean('PrivilegeOfFunctions0');
            $table->boolean('PrivilegeOfFunctions1');
            $table->boolean('PrivilegeOfFunctions2');
            $table->boolean('PrivilegeOfFunctions3');
            $table->boolean('PrivilegeOfFunctions4');
            $table->boolean('PrivilegeOfFunctions5');
            $table->boolean('PrivilegeOfFunctions6');
            $table->boolean('PrivilegeOfFunctions7');
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
