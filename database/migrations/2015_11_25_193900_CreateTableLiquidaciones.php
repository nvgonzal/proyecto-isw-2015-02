<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLiquidaciones extends Migration {

	/**
	 * Corre la migracion para crear la tabla de las liquidaciones de sueldo.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('liquidaciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('fecha_emision');
			$table->float('total_bruto');
			$table->float('horas_extra');
			$table->float('descuento_salud');
			$table->float('descuento_previcional');
			$table->float('total_liquido');
			$table->text('detalle_liquidacion');
			$table->string('rut_empleado');
			$table->timestamps();
			$table->softDeletes();
			//Claves foraneas
			$table->foreign('rut_empleado')->references('rut')->on('empleados');
		});
	}

	/**
	 * Revierte la migracion de la tabla liquidaciones
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('liquidaciones');
	}

}
