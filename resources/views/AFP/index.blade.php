@extends('master')

@section('titulo','Informacion AFP')

@section('contenido')
    <a class="btn btn-success boton-fixed btn-lg hidden-sm hidden-xs" data-toggle="tooltip" title="Agregar AFP"
       href="{!! URL::to('afp/create') !!}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <a class="btn btn-success boton-fixed btn-sm hidden-lg hidden-md" data-toggle="tooltip" title="Agregar empleado"
       href="{!! URL::to('afp/create') !!}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <table class="table table-hover">
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
                @if($AFP->email!=null)
                    <td>{{$AFP->email}}</td>
                @else
                    <td>Sin email de contacto</td>
                @endif
                @if($AFP->telefono)
                <td>{{$AFP->telefono}}</td>
                @else
                    <td>Sin telefono de contacto</td>
                @endif
                <td>{{$AFP->link_envio}}</td>
                <td>
                    </a>
                    <a class="btn btn-warning btn-sm" data-toggle="tooltip" title="Editar informacion"
                       href="{{ URL::to('afp/'.$AFP->id.'/edit') }}">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                    <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar AFP"
                       href="{{ route('afp.destroy',$AFP->id) }}" onclick="alert('Se eliminara la AFP');">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center"> {!! $AFPs->render() !!}</div>

@endsection