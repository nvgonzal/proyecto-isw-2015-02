@extends('master')

@section('titulo','Ingresar Informacion Isapre')

@section('contenido')
    <ol class="breadcrumb">
        <li><a href={{URL::to('isapres')}}>ISAPRES</a></li>
        <li class="active">Ingresar ISAPRE</li>
    </ol>
    <div class="page-header">
        <h3>Formulario edicion ISAPRE {{$isapre->nombre}}</h3>
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
        {!! Form::model($isapre,['route'=>['isapres.update',$isapre],'class'=>'form-horizontal','method'=>'PUT']) !!}
        <div class="form-group">
            {!! Form::label('rut','RUT Institucion',['class'=>'control-label']) !!}
            {!! Form::text('rut',null,['class'=>'form-control','placeholder'=>'Ingrese RUT institucion...','disabled']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre Isapre',['class'=>'control-label']) !!}
            {!! Form::text('nombre', null,['class'=>'form-control','placeholder'=>'Ingrese nombre...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefono', 'Telefono',['class'=>'control-label']) !!}
            {!! Form::text('telefono', null,['class'=>'form-control','placeholder'=>'Ingrese telefono contacto...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','E-mail',['class'=>'control-label']) !!}
            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese Email contacto...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('link_envio','Dirreccion de envio',['class'=>'control-label']) !!}
            {!! Form::text('link_envio',null,['class'=>'form-control','placeholder'=>'Direccion de envio...']) !!}
        </div>

        <br>
        {!! Form::submit('Ingresar Informacion Isapre',['class'=>'btn btn-success']) !!}

        {!! Form::close() !!}
        <br>
        <br>
        <br>
    </div>
@stop
