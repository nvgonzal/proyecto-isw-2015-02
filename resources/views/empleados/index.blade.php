@extends('master')

@section('titulo','Informacion empleados')

@section('contenido')
    <table class="table table-striped">
        <th>Rut</th>
        <th>Nombres</th>
        <th>Apellido Paterno</th>
        <th>Apeliido Materno</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Cargo</th>
        <th>Acciones</th>
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{$empleado->rut}}</td>
                    <td>{{$empleado->nombres}}</td>
                    <td>{{$empleado->apellido_paterno}}</td>
                    <td>{{$empleado->apellido_materno}}</td>
                    <td>{{$empleado->telefono}}</td>
                    <td>{{$empleado->email}}</td>
                    <td>{{$empleado->cargo}}</td>
                    <td>
                        <a class="btn btn-default" data-toggle="tooltip" title="Informacion detallada"
                           href="{!! URL::to('empleados/'.$empleado->rut) !!}">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
    </table>
    <div class="text-center"> {!! $empleados->render() !!}</div>

@endsection