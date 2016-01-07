<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAsistencias extends Migration {

	/**
	 * Corre la migracion para crear la tabla de asistencias
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asistencias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('fecha');
            $table->time('hora_ingreso');
            $table->time('hora_salida');
            $table->float('horas_extra');
            $table->string('rut_empleado',12);
			$table->timestamps();
            $table->softDeletes();
            //claves foraneas
            $table->foreign('rut_empleado')->references('rut')->on('empleados')
				->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Revierte la creacion de la tabla asistencias.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('asistencias');
	}

}
