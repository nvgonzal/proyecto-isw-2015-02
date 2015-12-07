@extends('master')

@section('titulo',$empleado->nombres.' '.$empleado->apellido_paterno.' '.$empleado->apellido_materno)

@section('contenido')
    {{$empleado->nombres}}<br>
    {{$empleado->apellido_paterno}}<br>
    {{$empleado->apellido_materno}}<br>
    {{$empleado->f_nacimiento}}<br>
    {{$empleado->f_incorporacion}}<br>
    {{$empleado->cargo}}<br>
    {{$empleado->telefono}}<br>
    {{$empleado->email}}<br>
    {{$empleado->domicilio}}<br>
    {{$empleado->AFP->nombre}}<br>
    @if($empleado->id_aseguradora==null)
        {{'Empleado no tiene afiliacion a aseguradora'}}<br>
    @else
    {{$empleado->Aseguradora->nombre}}<br>
    @endif
    {{$empleado->sueldo_base}}<br>
    {{$empleado->cuenta_bancaria}}<br>
@endsection