<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Corre la migracion para crear la tabla de Cuentas de la base de datos
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuentas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('rut',12);
			$table->string('password', 60);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Revierte la creacion de la tabla cuentas
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cuentas');
	}

}
