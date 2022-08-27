<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePaginaSecretaria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagina_secretaria', function (Blueprint $table) {
            $table->unsignedInteger('pagina_id')->nullable();
            $table->unsignedInteger('secretaria_id')->nullable();
            $table->foreign('pagina_id')->references('id')->on('paginas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagina_secretaria');
    }
}
