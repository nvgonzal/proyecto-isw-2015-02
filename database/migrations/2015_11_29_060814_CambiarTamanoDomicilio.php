<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CambiarTamanoDomicilio extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('empleados', function(Blueprint $table)
		{
			$table->string('domicilio')->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('empleados', function(Blueprint $table)
		{
			$table->string('domicilio',50)->change();
		});
	}

}
