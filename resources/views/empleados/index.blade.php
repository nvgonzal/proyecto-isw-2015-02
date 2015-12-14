@extends('master')

@section('titulo','Informacion empleados')

@section('contenido')
    <a class="btn btn-success boton-fixed" data-toggle="tooltip" title="Agregar empleado"
       href="{!! URL::to('empleados/create') !!}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <div class="container">
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
                        <a class="btn btn-primary" data-toggle="tooltip" title="Informacion detallada"
                           href="{!! URL::to('empleados/'.$empleado->rut) !!}">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </a>
                        <a class="btn btn-warning" data-toggle="tooltip" title="Editar informacion"
                           href="{!! URL::to('empleados/'.$empleado->rut.'/edit') !!}">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="text-center"> {!! $empleados->render() !!}</div>
@stop