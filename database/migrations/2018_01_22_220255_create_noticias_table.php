<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateNoticiasTable.
 */
class CreateNoticiasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noticias', function (Blueprint $table) {
			$table->increments('id');
			$table->string('titulo');
			$table->string('descricao');

			//Categoria
			$table->integer('categoria_id')->unsigned()->nullable();
			$table->foreign('categoria_id')->references('id')->on('categorias');

			//Url
			$table->string('url')->unique();
			$table->enum('destaque', [0, 1])->default(0);
			$table->string('imagem');
			$table->string('caminho_imagem');
			$table->longText('conteudo');
			$table->date('data_publicacao');
			$table->time('hora_publicacao');
			$table->enum('ativo', [0, 1])->default(0);

			$table->timestamps();

			//Galeria
			$table->integer('galeria_id')->unsigned()->nullable();
			$table->foreign('galeria_id')->references('id')->on('galerias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('noticias');
	}
}
