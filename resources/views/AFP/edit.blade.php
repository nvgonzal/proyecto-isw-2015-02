@extends('master')

@section('titulo','Editar '.$AFP->nombre.'')

@section('contenido')
    <ol class="breadcrumb">
        <li><a href={{URL::to('AFP')}}>AFP</a></li>
        <li class="active">Editar</li>
    </ol>
    <div class="page-header">
        <h3>Formulario edicion AFP {{$AFP->nombres}}</h3>
    </div>
    @if($errors->has())
        <div class="alert alert-danger">
            <ul>
                <strong>Whoops!</strong> Hubo problemas con tus entradas.
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        {!! Form::model($AFP,['route'=>['afp.update',$AFP],'class'=>'form-horizontal','method'=>'PUT']) !!}
        <div class="form-group">
            {!! Form::label('rut','Rut',['class'=>'control-label']) !!}
            {!! Form::text('rut',null,['class'=>'form-control','disabled']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombre','Nombre',['class'=>'control-label']) !!}
            {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese nombre de AFP']) !!}
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('email', 'E-Mail',['class'=>'control-label']) !!}
            {!! Form::text('email', null,['class'=>'form-control','placeholder'=>'Ingrese correo electronico']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('telefono', 'Telefono',['class'=>'control-label']) !!}
            {!! Form::text('telefono', null,['class'=>'form-control','placeholder'=>'Ingrese telefono']) !!}
            <span class=" glyphicon glyphicon-earphone form-control-feedback"></span>
        </div>
        <div class="form-group">
            {!! Form::label('link_envio', 'Direccion de envio',['class'=>'control-label']) !!}
            {!! Form::text('link_envio', null,['class'=>'form-control','placeholder'=>'Ingrese direccion de envio a la AFP']) !!}
        </div>


        {!! Form::submit('Modificar informacion de AFP',['class'=>'btn btn-success']) !!}

        {!! Form::close() !!}
    </div>
    <br>
    <br>
    <br>
@stop

@section('javascript')
    {!! Html::script('js/bootstrap-datepicker.js') !!}
@stop