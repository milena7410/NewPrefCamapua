<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateMidiasTable.
 */
class CreateMidiasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('midias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('arquivo');
            $table->string('descricao');
            $table->string('caminho');
            $table->string('mimetype');

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
		Schema::drop('midias');
	}
}
