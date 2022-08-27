<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateArquivosTable.
 */
class CreateArquivosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arquivos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('arquivo');
            $table->string('descricao');
            $table->string('caminho');
            $table->string('mimetype');

            $table->integer('publicacao_id')->unsigned()->nullable();
            $table->foreign('publicacao_id')->references('id')->on('publicacoes');

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
		Schema::drop('arquivos');
	}
}
