<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDeveloperUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
     * * id
     * user_id
     * user_github
     * user_odesk

     */
	public function up()
	{
        Schema::create('developer_user',function($table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('user_github');
            $table->string('user_odesk');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('developer_user');
	}

}
