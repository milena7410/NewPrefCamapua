<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreatePaginasTable.
 */
class CreatePaginasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paginas', function (Blueprint $table) {
			$table->increments('id');
			$table->string('titulo');
			$table->integer('pagina_id')->unsigned()->nullable();
			$table->string('url');
			$table->longText('conteudo');
			$table->enum('secretaria', [0, 1])->default(1);
			$table->enum('ativo', [0, 1])->default(1);
			$table->enum('target', [0, 1])->default(1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('paginas');
	}
}
