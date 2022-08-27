<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;


/**
 * Class CreateFotosTable.
 */
class CreateFotosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fotos', function(Blueprint $table) {
            $table->increments('id');
			$table->string('foto', 191);
            $table->string('caminho');
			$table->string('mimetype');
			$table->integer('galeria_id')->unsigned()->nullable();
			$table->enum('capa',[0,1])->default(0);
			$table->enum('ativo',[0,1])->default(0);
			$table->timestamps();
		
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
		Schema::drop('fotos');
	}
}
