@extends('master')

@section('titulo','Informacion AFP')

@section('contenido')
    <table class="table table-striped">
        <th>Rut</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Link</th>
        @foreach($AFP as $AFP)
            <tr>
                <td>{{$empleado->rut}}</td>
                <td>{{$empleado->nombres}}</td>
                <td>{{$empleado->email}}</td>
                <td>{{$empleado->telefono}}</td>
                <td>{{$empleado->link}}</td>
                <td>
                    <a class="btn btn-default" data-toggle="tooltip" title="Informacion detallada"
                       href="{!! URL::to('AFP/'.$AFP->rut) !!}">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center"> {!! $AFP->render() !!}</div>

@endsection