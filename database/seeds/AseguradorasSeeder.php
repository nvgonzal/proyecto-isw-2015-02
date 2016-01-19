<?php

use Illuminate\Database\Seeder;

class AseguradorasSeeder extends Seeder{

    public function run(){
        $faker = \Faker\Factory::create('es_ES');

        $rut = [
            '16.900.987-2',
            '8.685.462-7',
            '23.507.135-5',
            '5.376.355-3',
            '8.437.895-k',
            '10.538.312-6',
            '7.682.565-3',
            '5.044.788-k',
            '20.136.934-7',
            '12.600.304-8',
            '17.289.659-6',
            '24.694.198-k',
            '12.896.355-3',
            '14.644.276-5',
        ];

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
                'rut' => $rut[$i],
                'telefono' => $faker->optional()->phoneNumber,
                'email' => $faker->optional()->companyEmail,
                'link_envio' => $faker->unique()->ipv4,
                'created_at' => 'now',
                'updated_at' => 'now'
            ]);
        }


    }
}