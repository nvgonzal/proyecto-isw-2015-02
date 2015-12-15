@extends('master')

@section('titulo','Ingresar nueva AFP')

@section('contenido')
    <div class="page-header">
        <h3>Formulario ingreso de nueva AFP</h3>
    </div>
    <div class="row">
        {!! Form::open(['route'=>'AFP.store','class'=>'form-horizontal','metod'=>'post']) !!}
        <div class="form-group">
            {!! Form::label('rut','Rut',['class'=>'control-label']) !!}
            {!! Form::text('rut',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombre','Nombre',['class'=>'control-label']) !!}
            {!! Form::text('nombre',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('email', 'Correo Electronico',['class'=>'control-label']) !!}
            {!! Form::text('email', null,['class'=>'form-control']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('telefono', 'Telefono',['class'=>'control-label']) !!}
            {!! Form::text('telefono', null,['class'=>'form-control']) !!}
            <span class=" glyphicon glyphicon-earphone form-control-feedback"></span>
        </div>
        <div class="form-group">
            {!! Form::label('link', 'Sitio Web',['class'=>'control-label']) !!}
            {!! Form::text('link', null,['class'=>'form-control']) !!}
        </div>
        <br/>

        {!! Form::submit('Ingresar AFP',['class'=>'btn btn-default']) !!}

        {!! Form::close() !!}
    </div>

@endsection