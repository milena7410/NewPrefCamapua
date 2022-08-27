<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateEntidadesTable.
 */
class CreateEntidadesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entidades', function(Blueprint $table) {
            $table->increments('id');
			$table->string('entidade');
			$table->string('telefone');
			$table->string('email');
			$table->string('rua');
			$table->integer('numero');
			$table->string('bairro');
			$table->string('complemento');
			$table->string('cep');
			$table->string('cidade');
			$table->string('estado');
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
		Schema::drop('entidades');
	}
}
