<?php

use Illuminate\Database\Seeder;

class EmpleadosSeeder extends Seeder{

    public function run(){

        $faker = Faker\Factory::create('es_ES');

        $rut = [
            '11.617.240-2'
            ,'19.874.282-1'
            ,'18.564.964-4'
            ,'19.357.079-8'
            ,'14.563.308-7'
            ,'22.529.762-2'
            ,'14.715.126-8'
            ,'5.475.682-8'
            ,'24.017.811-7'
            ,'9.175.026-0'
            ,'10.498.782-6'
            ,'18.810.754-0'
            ,'5.954.993-6'
            ,'9.681.731-2'
            ,'11.759.168-9'
            ,'7.810.640-9'
            ,'13.140.358-5'
            ,'16.494.141-8'
            ,'6.390.193-8'
            ,'21.709.643-k'
            ,'5.858.394-4'
            ,'17.767.919-4'
            ,'22.963.725-8'
            ,'5.996.695-2'
            ,'19.654.175-6'
            ,'22.483.266-4'
            ,'21.009.732-5'
            ,'12.732.214-7'
            ,'23.512.292-8'
            ,'21.058.429-3'
            ,'9.741.867-5'
            ,'17.998.921-2'
            ,'10.041.124-5'
            ,'20.165.325-8'
            ,'11.111.111-1'
        ];
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
                'rut' => $rut[$i],
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
                'costo_plan_salud' => $faker->numberBetween($min = 6000,$max = 40000),
                'id_afp' => $faker->randomElement($afps),
                'id_aseguradora' => $faker->optional()->randomElement($aseguradoras),
                'id_cuenta' => null,
                'created_at' => 'now',
                'updated_at' => 'now'
            ]);

        }
    }
}