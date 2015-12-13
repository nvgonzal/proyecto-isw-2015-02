@extends('master')

@section('titulo','Editar empleado '.$empleado->nombres.' '.$empleado->apellido_paterno.' '.$empleado->apellido_materno)

@section('contenido')
    <div class="row">
        {!! Form::model($empleado,['route'=>['empleados.update',$empleado],'class'=>'form-horizontal','method'=>'PUT']) !!}
        <div class="form-group">
            {!! Form::label('nombres','Nombres',['class'=>'control-label']) !!}
            {!! Form::text('nombres',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('apellido_paterno', 'Apellido Paterno',['class'=>'control-label']) !!}
            {!! Form::text('apellido_paterno', null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('apellido_materno', 'Apellido Materno',['class'=>'control-label']) !!}
            {!! Form::text('apellido_materno', null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('rut','Rut',['class'=>'control-label']) !!}
            {!! Form::text('rut',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('f_nacimiento', 'Fecha Nacimiento',['class'=>'control-label']) !!}
            {!! Form::date('f_nacimiento',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('f_incorporacion', 'Fecha Incorporacion',['class'=>'control-label']) !!}
            {!! Form::date('f_incorporacion',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cargo', 'Cargo',['class'=>'control-label']) !!}
            {!! Form::select('cargo',['Profesor'=>'Profesor'
            ,'Profesor en practica'=>'Profesor en practica'
            ,'Secretario/a'=>'Secretario/a'
            ,'Inspector/a'=>'Inspector/a'],null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('titulo','Titulo',['class'=>'control-label']) !!}
            {!! Form::text('titulo',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('domicilio','Domicilio',['class'=>'control-label']) !!}
            {!! Form::text('domicilio',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('telefono', 'Telefono',['class'=>'control-label']) !!}
            {!! Form::text('telefono', null,['class'=>'form-control']) !!}
            <span class=" glyphicon glyphicon-earphone form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('email', 'Correo Electronico',['class'=>'control-label']) !!}
            {!! Form::text('email', null,['class'=>'form-control']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group">
            {!! Form::label('afp', 'Prevision social',['class'=>'control-label']) !!}
            <select class="form-control">
                @foreach(\App\AFP::all() as $afp)
                    <option value="{!! $afp->id !!}">{{$afp->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('salud', 'Prevision de salud',['class'=>'control-label']) !!}
            <select class="form-control">
                <option value="null">Sin prevision</option>
                @foreach(\App\Aseguradora::all() as $afp)
                    <option value="{!! $afp->id !!}">{{$afp->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('cuenta_bancaria', 'Cuenta Bancaria',['class'=>'control-label']) !!}
            {!! Form::text('cuenta_bancaria', null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('sueldo_base', 'Sueldo Base',['class'=>'control-label']) !!}
            {!! Form::text('sueldo_base', null,['class'=>'form-control']) !!}
        </div>
        <br/>

        {!! Form::submit('Modificar informacion empelado',['class'=>'btn btn-default']) !!}

        {!! Form::close() !!}
    </div>
@stop