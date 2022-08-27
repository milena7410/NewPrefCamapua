<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateNoticiaSecretariasTable.
 */
class CreateNoticiaSecretariasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noticia_secretaria', function(Blueprint $table) {
            $table->integer('noticia_id')->unsigned()->nullable();
            $table->foreign('noticia_id')->references('id')->on('noticias');

            $table->integer('secretaria_id')->unsigned()->nullable();
            $table->foreign('secretaria_id')->references('id')->on('secretarias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('noticia_secretaria');
	}
}
