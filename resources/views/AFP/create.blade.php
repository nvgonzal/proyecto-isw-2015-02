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
        <strong>Whoops!</strong> Hubo problemas con tus entradas.<br><br>
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {!! $error !!}<br>
            @endforeach
        </div>
    @endif
    <div class="row">
        {!! Form::open(['route'=>'AFP.store','class'=>'form-horizontal','metod'=>'post']) !!}
        <div class="form-group">
            {!! Form::label('rut','Rut',['class'=>'control-label']) !!}
            {!! Form::text('rut',null,['class'=>'form-control','placeholder'=>'Ingrese rut sin puntos ni guion',
            'onfocus'=>'formatear_rut();']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombre','Nombre',['class'=>'control-label']) !!}
            {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese nombre de AFP']) !!}
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('email', 'E-Mail',['class'=>'control-label']) !!}
            {!! Form::text('email', null,['class'=>'form-control','placeholder'=>'Ingrese correo electronico]) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('telefono', 'Telefono',['class'=>'control-label']) !!}
            {!! Form::text('telefono', null,['class'=>'form-control','placeholder'=>'Ingrese correo telefono]) !!}
            <span class=" glyphicon glyphicon-earphone form-control-feedback"></span>
        </div>
        <div class="form-group">
            {!! Form::label('link', 'Sitio Web',['class'=>'control-label']) !!}
            {!! Form::text('link', null,['class'=>'form-control','placeholder'=>'Ingrese sitio web de la AFP]) !!}
        </div>
        <br/>

        {!! Form::submit('Ingresar AFP',['class'=>'btn btn-default']) !!}

        {!! Form::close() !!}
    </div>
    <br>
    <br>
    <br>
@stop

@section('javascript')
    {!! Html::script('js/bootstrap-datepicker.js') !!}
    {!! Html::script('js/jquery.Rut.js') !!}
    <script>
        function formatear_rut(){
            $("#rut").Rut({
                validation: true,
                on_error: function(){ alert('Rut ingresado no valido'); }
            });}
        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            weekStart: 1,
            endDate: "0d",
            todayBtn: "linked",
            language: "es",
            calendarWeeks: true,
            todayHighlight: true
        });
    </script>
@stop