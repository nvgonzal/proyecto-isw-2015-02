<?php

use Illuminate\Database\Seeder;

class AFPSeeder extends Seeder
{

    public function run(){
        $faker = \Faker\Factory::create('es_ES');

        $rut = [
            '15.478.152-8',
            '11.760.675-9',
            '12.999.952-7',
            '6.249.893-5',
            '7.088.409-7',
            '9.016.629-8'
        ];

        $nombres = [
            'AFP Cuprum',
            'AFP Habitat',
            'AFP PlanVital',
            'ProVida AFP',
            'AFP Capital',
            'AFP Modelo'
        ];

        for($i=0;$i<6;$i++){
            DB::table('afps')->insert([
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