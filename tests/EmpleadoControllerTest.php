<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 0019, 19-01-2016
 * Time: 07:47 PM
 */

namespace TestProyecto;


use App\Cuenta;
use App\Empleado;

class EmpleadoControllerTest extends \TestCase
{
    public function testingIndexFunction()
    {
        $user = Cuenta::where('rut', '=', '11.111.111-1')->first();
        $this->be($user);
        $this->call('GET', 'empleados');
        $this->assertResponseOk();
    }

    public function testingShowFunction()
    {
        $usuario = Cuenta::where('rut', '=', '11.111.111-1')->first();//Busca el usuario de prueba
        $this->be($usuario);//Conecta con el usuario de pruebas
        $empleado = Empleado::all()->random(1);//Busca una tupla de empleado aleatoria en la db
        $respuesta = $this->action('GET', 'EmpleadoController@show', ['id' => $empleado->id]);
        $this->assertEquals(200, $respuesta->getStatusCode());
    }

    public function testingStoreFunction()
    {
        $usuario = Cuenta::where('rut', '=', '11.111.111-1')->first();
        $this->be($usuario);
        $datos = [
            'rut' => '33.333.333-3',
            'nombres'=>'NombreTest',
            'apellido_paterno'=>'ApellidoPaternoTest',
            'apellido_materno'=>'ApellidoMaternoTest',
            'f_nacimiento' =>'1980-01-01',
            'f_incorporacion' => '2000-01-01',
            'cargo' => 'Profesor',
            'titulo' => 'Pedagogia en Ingles',
            'telefono'=>'+569 11223344',
            'email'=>'EmailTest@gmail.com',
            'domicilio' => 'Test Street 123',
            'sueldo_base' => '300000',
            'id_afp' => '1',
            'id_aseguradora' => '1',
            'costo_plan_salud' => '10000',
            '_token' => csrf_token(),
        ];
        $this->call('POST', 'empleados', $datos);
        $this->assertRedirectedTo('empleados');
    }

    /*
    public function testingDestroyFunction()
    {
        $usuario = Cuenta::where('rut','=','11.111.111-1')->first();
        $this->be($usuario);
        $this->call('GET','empleados/33.333.333-3/delete');
        $this->assertEquals()
    }


    public function testingDeleteFunction(){
        $usuario = Cuenta::where('rut','=','11.111.111-1')->first();
        $this->be($usuario);
        $empleado = Empleado::onlyTrashed()->find('33.333.333-3');
        $this->call('GET','empleados/33.333.333-3/destroy');
        $this->assertNull(Empleado::all()->find($empleado->rut));
    }
    */

}
