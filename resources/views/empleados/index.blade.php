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
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{$empleado->rut}}</td>
                    <td>{{$empleado->nombres}}</td>
                    <td>{{$empleado->apellido_paterno}}</td>
                    <td>{{$empleado->apellido_materno}}</td>
                    <td>{{$empleado->telefono}}</td>
                    <td>{{$empleado->email}}</td>
                </tr>
            @endforeach
    </table>
    {!!$empleados->render()!!}

@endsection