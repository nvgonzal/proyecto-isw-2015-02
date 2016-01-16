@extends('master')

@section('titulo','Informacion ISAPRES')

@section('contenido')
    <table class="table table-striped">
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
                <td>{{$isapre->telefono}}</td>
                <td>{{$isapre->email}}</td>
                <td>{{$isapre->link_envio}}</td>
                <td>
                    </a>
                    <a class="btn btn-warning btn-sm" data-toggle="tooltip" title="Editar informacion"
                       href="#">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                    <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar AFP"
                       href="#" onclick="alert('�Seguro que quiere eliminar ISAPRE?');">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center"> {!! $isapres->render() !!}</div>


    @stop