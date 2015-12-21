@extends('master')

@section('titulo','Editar AFP '.$AFP->nombre.)

@section('contenido')
    <div class="row">
        {!! Form::model($AFP,['route'=>['AFP.update',$AFP],'class'=>'form-horizontal','method'=>'PUT']) !!}
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

        {!! Form::submit('Modificar informacion de AFP',['class'=>'btn btn-default']) !!}

        {!! Form::close() !!}
    </div>
@stop