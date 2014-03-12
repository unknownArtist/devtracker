<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDeveloperLoggedHours extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void

	 */
	public function up()
	{
        Schema::create('developer_logged_hours',function($table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('brand_id');
            $table->date('date_logged');
            $table->string('hours_logged');
            $table->string('hours_rate');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::dropIfExists('developer_logged_hours');
	}

}
