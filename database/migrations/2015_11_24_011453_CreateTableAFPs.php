<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAFPs extends Migration {

	/**
	 * Corre la migrancion para crear la tabla en la base de datos que contiene la informacion de las AFP existentes
	 * en el sistema previsional chileno
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('afps');//Elimina la tabla AFPs si existe.
		Schema::create('afps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre',40);
			$table->string('telefono',35);
			$table->string('email',50);
			$table->string('link_envio',100);
			$table->timestamps();
		});
	}

	/**
	 * Revierte la migracion de la tabla AFP
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('afps');
	}

}
