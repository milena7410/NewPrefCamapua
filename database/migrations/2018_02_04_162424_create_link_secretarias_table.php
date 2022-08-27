<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLinkSecretariasTable.
 */
class CreateLinkSecretariasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('link_secretaria', function(Blueprint $table) {
            $table->integer('secretaria_id')->unsigned()->nullable();
            $table->foreign('secretaria_id')->references('id')->on('secretarias');

            $table->integer('link_id')->unsigned()->nullable();
            $table->foreign('link_id')->references('id')->on('links');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('link_secretaria');
	}
}
