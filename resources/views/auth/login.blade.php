@extends('master-no-nav')

@section('titulo','Inicio sesion')

@section('contenido')
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title"><strong>Iniciar sesion </strong></h3></div>
                    <div class="panel-body">
                        {!! Form::open(['route'=>'auth.login.post','method'=>'POST']) !!}
                            <div class="form-group">
                                {!! Form::label('rut','Rut',['class'=>'control-label']) !!}
                                {!! Form::text('rut',null,['class'=>'form-control'
                                ,'placeholder'=>'Ingrese RUT sin puntos ni guion']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password','Contraseña',['class'=>'control-label']) !!}
                                {!! Form::password('password',['class'=>'form-control'
                                ,'placeholder'=>'Contraseña']) !!}
                            </div>
                            {!! Form::submit('Ingresar',['class'=>'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="panel-footer"><a href="#"><strong>¿Olvidaste tu contraseña?</strong></a></div>
                </div>
            </div>
        </div>
    </div>
    @for($i=1;$i<=5;$i++)
        <br>
    @endfor
@stop

@section('javascript')
    {!! Html::script('js/jquery.Rut.js') !!}
    <script type="text/javascript">
    function formatear_rut(){
    $("#rut").Rut({
            validation: true
            });
        }
    </script>
@stop

