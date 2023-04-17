<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSecretariosTable.
 */
class CreateSecretariosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('secretarios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->integer('cargo_id')->unsigned()->nullable();
            $table->foreign('cargo_id')->references('id')->on('cargos');

            $table->longText('descricao');
            $table->string('caminho_imagem',100);
            $table->string('imagem');
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
		Schema::drop('secretarios');
	}
}
