<?php

use Illuminate\Database\Seeder;

class EmpleadosSeeder extends Seeder{

    public function run(){

        $faker = Faker\Factory::create('es_ES');

        $cargos = [
            'Profesor',
            'Profesor en practica',
            'Secretario/a',
            'Inspector'
        ];

        $titulos = [
            'Pedagogia en Matematicas y Computacion',
            'Pedagogia en Historia y Geografia',
            'Pedagogia en Espanol',
            'Pedagogia en Filosofia',
            'Pedagogia en Educacion Fisica',
            'Pedagogia en Ingles',
            'Pedagogia en Ciencias Naturales y Fisicas',
            'Pedagogia en Ciencias Naturales y Quimicas',
            'Pedagogia en Ciencias Naturales y Biologia',
            'Pedagogia en Educacion Musical',
            'Pedagogia en Artes Plasticas'
        ];

        $afps = \App\AFP::all()->lists('id');
        $aseguradoras = \App\Aseguradora::all()->lists('id');

        for($i=0;$i<36;$i++){
            DB::table('empleados')->insert([
                'rut' => $faker->unique()->numerify('##.###.###-#'),
                'nombres' => $faker->firstName,
                'apellido_paterno' => $faker->lastName,
                'apellido_materno' => $faker->lastName,
                'f_nacimiento' => $faker->date($format = 'Y-m-d', $max = '1993-12-31'),
                'f_incorporacion' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'cargo' => $faker->randomElement($cargos),
                'titulo' => $faker->randomElement($titulos),
                'telefono' => $faker->phoneNumber,
                'email' => $faker->freeEmail,
                'domicilio' => $faker->address,
                'sueldo_base' => $faker->numberBetween($min = 250000,$max = 1000000),
                'cuenta_bancaria' => $faker->optional()->bankAccountNumber,
                'id_afp' => $faker->randomElement($afps),
                'id_aseguradora' => $faker->optional()->randomElement($aseguradoras),
                'id_cuenta' => null,
                'created_at' => 'now',
                'updated_at' => 'now'
            ]);

        }
    }
}