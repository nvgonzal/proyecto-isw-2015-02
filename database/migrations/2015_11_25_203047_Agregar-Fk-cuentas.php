<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarFkCuentas extends Migration {

	/**
	 * Corre la migracion para agregar una clave foranea a la tabla cuentas que hace referencia a la tabla empleados.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cuentas', function(Blueprint $table)
		{
			//
			$table->foreign('rut')->references('rut')->on('empleados');
		});
	}

	/**
	 * Elimina la declaracion de la clave foranea
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cuentas', function(Blueprint $table)
		{
			//
            $table->dropForeign('rut');
		});
	}

}
