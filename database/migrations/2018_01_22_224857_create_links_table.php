<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateLinksTable.
 */
class CreateLinksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('links', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo',['bt','lu']);
            $table->enum('target',[0,1])->default(0);
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->string('imagem');
            $table->string('caminho_imagem');
            $table->string('url');
            $table->enum('ativo',[0,1])->default(0);
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
		Schema::drop('links');
	}
}
