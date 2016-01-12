<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmpleados extends Migration {

	/**
	 * Corre la migracion para crear la tabla de empleados de la base de datos del colegio
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empleados', function(Blueprint $table)
		{
			$table->string('rut',12);
			$table->string('nombres',30);
			$table->string('apellido_paterno',40);
			$table->string('apellido_materno',40);
			$table->date('f_nacimiento');
			$table->date('f_incorporacion');
			$table->string('cargo');
            $table->string('titulo');
			$table->string('telefono',35);
			$table->string('email',30);
			$table->string('domicilio');
            $table->float('sueldo_base');
			$table->string('cuenta_bancaria')->nullable();
            $table->integer('id_afp')->unsigned();//Poner esta funcion es necesario para usarlas como claves foraneas
            $table->integer('id_aseguradora')->unsigned()->nullable();
			$table->integer('id_cuenta')->unsigned()->nullable();
			$table->float('costo_plan_salud')->nullable();
			$table->timestamps();
			$table->softDeletes();
            //Se define la clave primaria
            $table->primary('rut');
            //Se definen claves foraneas
            /**
             * Primero el atributo que sea la clave foranea, segundo la clave primaria de la otra tabla,
             * y por ultimo de que tabla se hace referencia
            */
            $table->foreign('id_afp')->references('id')->on('afps')
				->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_aseguradora')->references('id')->on('salud')
				->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_cuenta')->references('id')->on('cuentas')
				->onUpdate('cascade')->onDelete('set null');
		});
	}

	/**
	 * Revierte la creacion de la tabla de empleados
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empleados');
	}

}
