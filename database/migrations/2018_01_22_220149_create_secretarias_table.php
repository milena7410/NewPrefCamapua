<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSecretariasTable.
 */
class CreateSecretariasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('secretarias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('secretaria')->unique();
            $table->string('url')->unique();
            $table->string('email');

            $table->integer('secretario_id')->unsigned()->nullable();
            $table->foreign('secretario_id')->references('id')->on('secretarios');

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
		Schema::drop('secretarias');
	}
}
