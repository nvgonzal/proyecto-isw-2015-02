@extends('master-no-nav')

@section('titulo','Pagina no encontrada')

@section('estilos')
    <style>
        .error-template {padding: 40px 15px;text-align: center;}
        .error-actions {margin-top:15px;margin-bottom:15px;}
        .error-actions .btn { margin-right:10px; }
    </style>

    @stop

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        Oops!</h1>
                    <h2>
                        404</h2>
                    <div class="error-details">
                        ¡La pagina solicitada no se encuentra disponible!
                    </div>
                    <div class="error-actions">
                        <a href="{{URL::to('home')}}" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span>
                            Volver a inicio </a><a href="#" class="btn btn-default btn"><span class="glyphicon glyphicon-envelope"></span> Contactar con el administrador </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop