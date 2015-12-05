<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        {!!Html::style('css/bootstrap.css')!!}
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo')|Colegio Alba</title>

    </head>

    <body>
        <header>
        </header>
        <div class="container">
            @yield('contenido')
        </div>
        <footer class="panel-footer">
            <div class="container">
                <span class="label label-info">Pagina creada para el ramo de ingenieria de software 2015</span>
            </div>
        </footer>
        {!! Html::script('js/bootstrap.js') !!}

    </body>

</html>