<?php

use Illuminate\Database\Seeder;

class CuentasSeeder extends Seeder{

    public function run(){
        DB::table('cuentas')->insert([
           'password' => bcrypt('isw123'),
            'rut' => '1.111.111-1',
            'remember_token' => null,
        ]);
    }

}