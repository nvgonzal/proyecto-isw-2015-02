@extends('master')

@section('titulo','Informacion AFP')

@section('contenido')
    <a class="btn btn-success boton-fixed btn-lg" data-toggle="tooltip" title="Agregar AFP"
       href="{!! URL::to('AFP/create') !!}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <table class="table table-striped">
        <th>Rut</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Link</th>
        @foreach($AFP as $AFP)
            <tr>
                <td>{{$AFP->rut}}</td>
                <td>{{$AFP->nombres}}</td>
                <td>{{$AFP->email}}</td>
                <td>{{$AFP->telefono}}</td>
                <td>{{$AFP->link}}</td>
                <td>
                    <a class="btn btn-default" data-toggle="tooltip" title="Informacion detallada"
                       href="{!! URL::to('AFP/'.$AFP->rut) !!}">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </a>
                    </a>
                    <a class="btn btn-warning btn-sm" data-toggle="tooltip" title="Editar informacion"
                       href="{{ URL::to('AFP/'.$AFP->rut.'/edit') }}">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                    <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar AFP"
                       href="{{ route('AFP.destroy',$AFP->rut) }}" onclick="alert('¿Seguro que quiere eliminar AFP?' +
                            '\nPuedes recuperarlo despues');">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center"> {!! $AFP->render() !!}</div>

@endsection