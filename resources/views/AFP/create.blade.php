@extends('master')

@section('titulo','Ingresar nueva AFP')

@section('contenido')
    <ol class="breadcrumb">
        <li><a href={{URL::to('AFP')}}>AFP</a></li>
        <li class="active">Crear</li>
    </ol>
    <div class="page-header">
        <h3>Formulario para ingresar nueva AFP</h3>
    </div>
    @if($errors->has())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Hubo problemas con tus entradas.
            <ul>
            @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        {!! Form::open(['route'=>'afp.store','class'=>'form-horizontal','metod'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('rut','Rut',['class'=>'control-label']) !!}
            {!! Form::text('rut',null,['class'=>'form-control','placeholder'=>'Ingrese rut sin puntos ni guion',
            'onfocus'=>'formatear_rut();']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombre','Nombre',['class'=>'control-label']) !!}
            {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre institucion...']) !!}
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('email', 'E-Mail',['class'=>'control-label']) !!}
            {!! Form::text('email', null,['class'=>'form-control','placeholder'=>'Ingrese correo electronico...']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('telefono', 'Telefono',['class'=>'control-label']) !!}
            {!! Form::text('telefono', null,['class'=>'form-control','placeholder'=>'Telefono contacto...']) !!}
            <span class=" glyphicon glyphicon-earphone form-control-feedback"></span>
        </div>
        <div class="form-group">
            {!! Form::label('link_envio', 'Direccion de envio',['class'=>'control-label']) !!}
            {!! Form::text('link_envio', null,['class'=>'form-control','placeholder'=>'Ingrese direccion de envio de la AFP...']) !!}
        </div>
        <br/>

        {!! Form::submit('Ingresar AFP',['class'=>'btn btn-success']) !!}

        {!! Form::close() !!}
    </div>
    <br>
    <br>
    <br>
@stop

@section('javascript')
    {!! Html::script('js/jquery.Rut.js') !!}
    <script>
        function formatear_rut(){
            $("#rut").Rut({
                validation: true,
                on_error: function(){ alert('Rut ingresado no valido'); }
            });}
    </script>
@stop