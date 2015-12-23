<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina creada para el ramo de ingenieria de software">
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/estilo.css') !!}
    <title> Inicio de sesion | Colegio Alba</title>
    <style type='text/css'>
        body{
            background-color:#393939;
        }
        .tabla_login {
            background: lightgray;
            padding: 25px;
            border: 1px solid lightgray;
            border-radius: 10px;
        }
        .div_login {
            position: absolute;
            margin-left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        #negrita{
            font-weight: bold;
        }
        .texto{
            font-family:arial,sans-serif;
            font-size: 20px;
        }
        #entrar{
            padding: 1px 14px;
            font-weight: bold;
            background: lightseagreen;
            width: 100%;
            padding: 10px;
            border: 1px solid lightseagreen;
            border-radius: 5px;
            font-size: 16px;
        }
        .input_login{
            width: 300px;
            height: 30px;
            margin: 6px auto;
            background: white;
            border: 1px solid white;
            border-radius: 5px;
            padding: 5px;
            font-size: 16px;
        }
    </style>

</head>

<body>
<div class='div_login' align='center'>
    <form id="form" method="post" action="{{URL::to('/auth/login')}}" >
        <table class='tabla_login' cellspacing='5px'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <td><input type='text' id='rut' class='input_login' required='required' maxlength='12' placeholder='Rut' onfocus="formatear_rut();"></td>
            </tr>
            <tr>
                <td><input type='password' id='pass' class='input_login' required='required' maxlength='60'  placeholder='Contraseña'></td>
            </tr>
            <tr>
                <td>
                    <div align='center'>
                        <input id='entrar' type='submit' value='Entrar' >
                    </div>
                </td>
            </tr>
        </table>
    </form>
    </br>
</div>
{!! Html::script('js/bootstrap.js') !!}
{!! Html::script('js/jquery-1.11.3.js') !!}
{!! Html::script('js/jquery.Rut.js') !!}
<script type="text/javascript">
    function cambiar_color(elemento,color){
        elemento.style.background=color;
    }

    function formatear_rut(){
        $("#rut").Rut({
            validation: true
        });
    }
</script>
</body>

</html>