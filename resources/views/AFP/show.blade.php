@extends('master')

@section('titulo',$AFP->nombre.')

@section('contenido')
    {{$AFP->nombres}}<br>
    {{$AFP->email}}<br>
    {{$AFP->telefono}}<br>
    {{$AFP->link}}<br>
@endsection