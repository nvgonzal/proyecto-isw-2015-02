@extends('master')

@section('titulo','Editar empleado '.$empleado->nombres.' '.$empleado->apellido_paterno.' '.$empleado->apellido_materno)

@section('contenido')
    <ol class="breadcrumb">
        <li><a href={{URL::to('empleados')}}>Empleados</a></li>
        <li><a href="{{url::to('empleados/'.$empleado->rut)}}">{{$empleado->nombres}} {{$empleado->apellido_paterno}} {{$empleado->apellido_materno}}</a></li>
        <li class="active">Editar</li>
    </ol>
    <div class="page-header">
        <h3>Formulario edicion empleado {{$empleado->nombres}} {{$empleado->apellido_paterno}} {{$empleado->apellido_materno}}</h3>
    </div>
    @if($errors->has())
        <strong>Whoops!</strong> Hubo problemas con tus entradas.<br><br>
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {!! $error !!}<br>
            @endforeach
        </div>
    @endif
    <div class="container">
        {!! Form::model($empleado,['route'=>['empleados.update',$empleado],'class'=>'form-horizontal','method'=>'PUT']) !!}
        <div class="form-group">
            {!! Form::label('rut','Rut',['class'=>'control-label']) !!}
            {!! Form::text('rut',null,['class'=>'form-control','placeholder'=>'Ingrese rut sin puntos ni guion',
            'onfocus'=>'formatear_rut();','disabled']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombres','Nombres',['class'=>'control-label']) !!}
            {!! Form::text('nombres',null,['class'=>'form-control','placeholder'=>'Ingrese nombre de empleado']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('apellido_paterno', 'Apellido Paterno',['class'=>'control-label']) !!}
            {!! Form::text('apellido_paterno', null,['class'=>'form-control','placeholder'=>'Ingrese apellido paterno...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('apellido_materno', 'Apellido Materno',['class'=>'control-label']) !!}
            {!! Form::text('apellido_materno', null,['class'=>'form-control','placeholder'=>'Ingrese apellido materno...']) !!}
        </div>
        <div class="form-group date">
            {!! Form::label('f_nacimiento', 'Fecha Nacimiento',['class'=>'control-label']) !!}
            {!! Form::text('f_nacimiento',null,['class'=>'form-control datepicker']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('f_incorporacion', 'Fecha Incorporacion',['class'=>'control-label']) !!}
            {!! Form::text('f_incorporacion',null,['class'=>'form-control datepicker']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cargo', 'Cargo',['class'=>'control-label']) !!}
            {!! Form::select('cargo',['Profesor'=>'Profesor'
            ,'Profesor en practica'=>'Profesor en practica'
            ,'Secretario/a'=>'Secretario/a'
            ,'Inspector/a'=>'Inspector/a'],null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('titulo','Titulo',['class'=>'control-label']) !!}
            {!! Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Ingrese titulo universitario...']) !!}
            <span class=" glyphicon glyphicon-education form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('domicilio','Domicilio',['class'=>'control-label']) !!}
            {!! Form::text('domicilio',null,['class'=>'form-control','placeholder'=>'Ingrese direccion del domicilio']) !!}
            <span class=" glyphicon glyphicon-home form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('telefono', 'Telefono',['class'=>'control-label']) !!}
            {!! Form::text('telefono', null,['class'=>'form-control','placeholder'=>'Ingrese numero de telefono...']) !!}
            <span class=" glyphicon glyphicon-earphone form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {!! Form::label('email', 'Correo Electronico',['class'=>'control-label']) !!}
            {!! Form::text('email', null,['class'=>'form-control','placeholder'=>'Ingrese correo electronico...']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group">
            {!! Form::label('id_afp', 'Prevision social',['class'=>'control-label']) !!}
            <select class="form-control" id="id_afp" name="id_afp">
                @foreach(\App\AFP::all() as $afp)
                    <option value="{{ $afp->id }}">{{$afp->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('id_aseguradora', 'Prevision de salud',['class'=>'control-label']) !!}
            <select class="form-control" id="id_aseguradora" name="id_aseguradora">
                <option value="null">Sin prevision</option>
                @foreach(\App\Aseguradora::all() as $aseguradora)
                    <option value="{{$aseguradora->id }}">{{$aseguradora->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('cuenta_bancaria', 'Cuenta Bancaria',['class'=>'control-label']) !!}
            {!! Form::text('cuenta_bancaria', null,['class'=>'form-control','placeholder'=>'Ingrese cuenta bancaria del empleado (opcional)']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('sueldo_base', 'Sueldo Base',['class'=>'control-label']) !!}
            {!! Form::text('sueldo_base', null,['class'=>'form-control','placeholder'=>'Ingrese suledo base del empleado...']) !!}
        </div>
        <br/>

        {!! Form::submit('Actualizar empleado',['class'=>'btn btn-success']) !!}

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