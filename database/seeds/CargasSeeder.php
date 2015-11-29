<?php

use Illuminate\Database\Seeder;

class CargasSeeder extends Seeder{

    public function run(){
        $faker = Faker\Factory::create('es_ES');

        $parentesco = [
            'Hijo',
            'Conyugue',
            'Primo',
            'Suegro',
            'Hermano',
            'Padre/Madre',
            'Abuelo/Abuela',
            'Tio',
            'Sobrino',
            'Cunado'
        ];

        $ocupacion = [
            'Trabajador dependiente',
            'Trabajador independiente',
            'Cesante',
            'Estudiante',
            'Sin ocupacion',
            'Jubilado'
        ];

        $rut_empleados = \App\Empleado::all()->lists('rut');

        for($i=0;$i<60;$i++){
            DB::table('cargas')->insert([
                'rut' => $faker->unique()->numerify('##.###.###-#'),
                'nombres' => $faker->firstName,
                'apellido_paterno' => $faker->lastName,
                'apellido_materno' => $faker->lastName,
                'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'parentesco' => $faker->randomElement($parentesco),
                'ocupacion' => $faker->randomElement($ocupacion),
                'rut_empleado' => $faker->randomElement($rut_empleados),
                'created_at' => 'now',
                'updated_at' => 'now'
            ]);
        }
    }
}