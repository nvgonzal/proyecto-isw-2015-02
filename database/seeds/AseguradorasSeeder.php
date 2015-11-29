<?php

use Illuminate\Database\Seeder;

class AseguradorasSeeder extends Seeder{

    public function run(){
        $faker = \Faker\Factory::create('es_ES');

        $nombres = [
            'FONASA',
            'Banmedica S.A.',
            'Chuquicamata Ltda.',
            'Colmena Golden Cross S.A.',
            'Consalud S.A.',
            'Cruz Blanca S.A.',
            'Cruz del Norte Ltda.',
            'Optima S.A.',
            'Fundacion Ltda.',
            'Fusat Ltda.',
            'Masvida S.A.',
            'Rio Blanco Ltda.',
            'San Lorenzo Ltda.',
            'Vida Tres S.A.'
        ];

        for($i=0;$i<14;$i++){
            DB::table('salud')->insert([
                'nombre' => $nombres[$i],
                'telefono' => $faker->phoneNumber,
                'email' => $faker->companyEmail,
                'link_envio' => $faker->unique()->ipv6,
                'created_at' => 'now',
                'updated_at' => 'now'
            ]);
        }


    }
}