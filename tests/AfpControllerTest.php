<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 0020, 20-01-2016
 * Time: 02:52 AM
 */

namespace TestProyecto;


use App\AFP;
use App\Cuenta;

class AfpControllerTest extends \TestCase
{

    public function testingIndexFunction()
    {
        $user = Cuenta::where('rut', '=', '11.111.111-1')->first();
        $this->be($user);
        $this->call('GET', 'afp');
        $this->assertResponseOk();
    }


    public function testingStoreFunction()
    {
        $usuario = Cuenta::where('rut', '=', '11.111.111-1')->first();
        $this->be($usuario);
        $datos = [
            'rut' => '44.444.444-4',
            'nombres'=>'AFPTest',
            'telefono'=>'+569 11223344',
            'link_envio' => '123.23.45.123',
            '_token' => csrf_token(),
        ];
        $this->call('POST', 'afp', $datos);
        $this->assertRedirectedTo('afp');
    }

    /*
    public function testingDeleteFunction(){
        $usuario = Cuenta::where('rut','=','11.111.111-1')->first();
        $this->be($usuario);
        $empleado = AFP::all()->find('33.333.333-3');
        $this->call('GET','empleados/33.333.333-3/destroy');
        $this->assertNull(AFP::all()->find($empleado->rut));
    }*/
}
