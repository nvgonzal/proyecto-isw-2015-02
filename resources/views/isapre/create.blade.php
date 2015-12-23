@extends('panchito')

@section('Isapre','Ingresar Informacion Isapre')

@section('contenido')
    <div class="page-header">
        <h3>Formulario Informacion Previsional(ISAPRE)</h3>
    </div>
    <div class="row">
        {!! Form::open(['route'=>'isapre.store','class'=>'form-horizontal','method'=>'post']) !!}
        <div class="form-group">
            {!! Form::label('RUT Institucion','RUT Institucion',['class'=>'control-label']) !!}
            {!! Form::text('Rut Institucion',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Nombre Isapre', 'Nombre Isapre',['class'=>'control-label']) !!}
            {!! Form::text('Nombre Isapre', null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Telefono', 'Telefono',['class'=>'control-label']) !!}
            {!! Form::text('Telefono', null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('E-mail','E-mail',['class'=>'control-label']) !!}
            {!! Form::text('E-mail',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Link','Link',['class'=>'control-label']) !!}
            {!! Form::text('Link',null,['class'=>'form-control']) !!}
        </div>


        {!! Form::submit('Ingresar Informacion Isapre',['class'=>'btn btn-default']) !!}

        {!! Form::close() !!}
    </div>
@endsection