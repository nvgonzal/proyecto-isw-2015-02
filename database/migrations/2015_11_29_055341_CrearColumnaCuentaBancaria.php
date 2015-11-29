<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearColumnaCuentaBancaria extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('empleados', function(Blueprint $table)
		{
			$table->string('cuenta_bancaria')->nullable();
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
			$table->dropColumn('cuenta_bancaria');
		});
	}

}
