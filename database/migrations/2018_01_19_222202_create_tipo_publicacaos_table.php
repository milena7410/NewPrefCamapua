<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTipoPublicacaosTable.
 */
class CreateTipoPublicacaosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipo_publicacoes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
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
		Schema::drop('tipo_publicacoes');
	}
}
