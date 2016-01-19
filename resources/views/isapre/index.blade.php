@extends('master')

@section('titulo','Informacion ISAPRES')

@section('contenido')
    <a class="btn btn-success boton-fixed btn-lg hidden-sm hidden-xs" data-toggle="tooltip" title="Agregar AFP"
       href="{!! URL::to('isapres/create') !!}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <a class="btn btn-success boton-fixed btn-sm hidden-lg hidden-md" data-toggle="tooltip" title="Agregar empleado"
       href="{!! URL::to('isapres/create') !!}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <table class="table table-hover">
        <th>ID</th>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Link</th>
        <th>Acciones</th>
        @foreach($isapres as $isapre)
            <tr>
                <td>{{$isapre->id}}</td>
                <td>{{$isapre->rut}}</td>
                <td>{{$isapre->nombre}}</td>
                @if($isapre->email!=null)
                    <td>{{$isapre->email}}</td>
                @else
                    <td>Sin email de contacto</td>
                @endif
                @if($isapre->telefono)
                    <td>{{$isapre->telefono}}</td>
                @else
                    <td>Sin telefono de contacto</td>
                @endif
                <td>{{$isapre->link_envio}}</td>
                <td>
                    </a>
                    <a class="btn btn-warning btn-sm" data-toggle="tooltip" title="Editar informacion"
                       href="{{URL::to('isapres/'.$isapre->id.'/edit')}}">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                    <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar AFP"
                       href="{{route('isapres.destroy',$isapre->id)}}" onclick="alert('Se eliminara ISAPRE');">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center"> {!! $isapres->render() !!}</div>
@stop