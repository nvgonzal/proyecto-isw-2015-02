@extends('master-no-nav')

@section('titulo','Inicio sesion')

@section('contenido')
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title"><strong>Iniciar sesion </strong></h3></div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hay errores en tus datos<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['route'=>'auth.login.post','method'=>'POST']) !!}
                            <div class="form-group">
                                {!! Form::label('rut','Rut',['class'=>'control-label']) !!}
                                {!! Form::text('rut',null,['class'=>'form-control'
                                ,'placeholder'=>'Ingrese RUT sin puntos ni guion','onfocus'=>'formatear_rut();']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password','Contraseña',['class'=>'control-label']) !!}
                                {!! Form::password('password',['class'=>'form-control'
                                ,'placeholder'=>'Contraseña']) !!}
                            </div>
                            {!! Form::submit('Ingresar',['class'=>'btn btn-success col-md-6 col-md-offset-3']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="panel-footer"><a href="{{URL::to('reset/form')}}"><strong>¿Olvidaste tu contraseña?</strong></a></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    {!! Html::script('js/jquery.Rut.js') !!}
    <script type="text/javascript">
    function formatear_rut(){
    $("#rut").Rut({
            validation: true,
            on_error: function(){ alert('Rut ingresado no valido'); }
            });
        }
    </script>
@stop

