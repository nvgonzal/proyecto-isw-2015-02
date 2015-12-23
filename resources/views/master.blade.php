<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Pagina creada para el ramo de ingenieria de software">
        {!! Html::style('css/bootstrap.css') !!}
        {!! Html::style('css/estilo.css') !!}
        {!! Html::style('css/bootstrap-datepicker3.min.css') !!}
        <title>@yield('titulo') | Colegio Alba</title>

    </head>

    <body>
        <header>
            {!! Html::image(URL::to('img/banner.jpg'),'Banner',['class'=>'img-responsive'],null) !!}
        </header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand">
                        {!! HTML::image(URL::to('img/logo.png'),'logo.png',['class'=>'img-responsive repon']) !!}
                    </a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{!! URL::to('/home') !!}">Colegio Alba</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{!! Url::to('empleados') !!}">Empleados <span class="sr-only">(current)</span></a></li>
                        <li><a href="{!! Url::to('asistencia') !!}">Asistencia</a></li>
                        <li><a href="{!! URL::to('liquidaciones') !!}">Liquidaciones</a></li>
                    </ul>
                    <!--Barra para buscar-->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Cerrar sesion</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            @include('flash::message')
            @yield('contenido')
        </div>
       <footer class="panel-footer">
            <div class="text-center">
                <span class="text-info">
                    <h4>Pagina creada para el ramo de ingenieria de software</h4>
                </span>
            </div>
        </footer>
        {!! Html::script('js/jquery-1.11.3.js') !!}
        {!! Html::script('js/bootstrap.js') !!}
        @yield('javascript')
    </body>

</html>