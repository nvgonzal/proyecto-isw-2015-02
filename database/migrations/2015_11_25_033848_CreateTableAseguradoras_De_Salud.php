<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAseguradorasDeSalud extends Migration {

	/**
	 * Corre la migracion para crear la tabla de Aseguradoras de salud en la base de datos
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salud', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre',40);
			$table->string('telefono',30);
			$table->string('email',50);
			$table->string('link_envio',100);
			$table->timestamps();
		});
	}

	/**
	 * Revierte la creacion de la tabla de aseguradoras
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('salud');
	}

}
