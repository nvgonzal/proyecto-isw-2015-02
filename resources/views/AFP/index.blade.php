@extends('master')

@section('titulo','Informacion AFP')

@section('contenido')
    <a class="btn btn-success boton-fixed btn-lg" data-toggle="tooltip" title="Agregar AFP"
       href="{!! URL::to('afp/create') !!}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <table class="table table-striped">
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Link</th>
        <th>Acciones</th>
        @foreach($AFPs as $AFP)
            <tr>
                <td>{{$AFP->id}}</td>
                <td>{{$AFP->nombre}}</td>
                <td>{{$AFP->email}}</td>
                <td>{{$AFP->telefono}}</td>
                <td>{{$AFP->link_envio}}</td>
                <td>
                    </a>
                    <a class="btn btn-warning btn-sm" data-toggle="tooltip" title="Editar informacion"
                       href="{{ URL::to('afp/'.$AFP->id.'/edit') }}">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                    <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar AFP"
                       href="{{ route('afp.destroy',$AFP->rut) }}" onclick="alert('¿Seguro que quiere eliminar AFP?' +
                            '\nPuedes recuperarlo despues');">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center"> {!! $AFPs->render() !!}</div>

@endsection