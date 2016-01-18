<?php

use Illuminate\Database\Seeder;
use App\Empleado;

class CuentasSeeder extends Seeder{

    public function run(){
        DB::table('cuentas')->insert([
           'password' => bcrypt('isw123'),
            'rut' => '11.111.111-1',
            'remember_token' => null,
            'created_at' => 'now',
            'updated_at' => 'now'
        ]);

        $idCuenta=(array)DB::table('cuentas')
            ->where('rut','11.111.111-1')->first();


        DB::table('empleados')
            ->where('rut','11.111.111-1')
            ->update([
            'id_cuenta' => $idCuenta['id']
        ]);
    }

}