<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;


/**
 * Class CreateGaleriasTable.
 */
class CreateGaleriasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galerias', function (Blueprint $table) {
			$table->increments('id');
			$table->string('titulo');
			$table->text('descricao');
			$table->date('data_galeria');
			$table->enum('ativo', [0, 1])->default(0);
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
		Schema::drop('galerias');
	}
}
