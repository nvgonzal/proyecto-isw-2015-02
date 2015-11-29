<?php

use Illuminate\Database\Seeder;

class AFPSeeder extends Seeder
{

    public function run(){
        $faker = \Faker\Factory::create('es_ES');

        $nombres = [
            'AFP Cuprum',
            'AFP Habitat',
            'AFP PlanVital',
            'ProVida AFP',
            'AFP Capital',
            'AFP Modelo'
        ];

        for($i=0;$i<6;$i++){
            $now = date('Y-m-d H:i:s');
            DB::table('afps')->insert([
                'nombre' => $nombres[$i],
                'telefono' => $faker->phoneNumber,
                'email' => $faker->companyEmail,
                'link_envio' => $faker->unique()->ipv6,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }


    }


}