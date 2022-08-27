<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreatePublicacaosTable.
 */
class CreatePublicacaosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publicacoes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->integer('ano');
            $table->string('nome');
            $table->text('descricao');
			$table->string('url');
            $table->enum('ativo',[0,1])->default(0);
            $table->timestamps();
			$table->integer('tipo_publicacao_id')->unsigned()->nullable();
			$table->foreign('tipo_publicacao_id')->references('id')->on('tipo_publicacoes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('publicacoes');
	}
}
