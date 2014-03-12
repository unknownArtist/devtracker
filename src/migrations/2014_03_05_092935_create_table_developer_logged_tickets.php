<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDeveloperLoggedTickets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

    public function up()
	{
		Schema::create('developer_logged_tickets',function($table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('brand_id');
            $table->date('date_logged');
            $table->string('ticket_status');
            $table->string('ticket_type');
            $table->string('ticket_hours');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('developer_logged_tickets');
	}

}
