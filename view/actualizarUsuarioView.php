<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo $helper->url("usuarios","update"); ?>" method="post" class="col-lg-5">
            <h3>Actualizar usuario</h3>
            <hr/>
            <input type="hidden" name="rut" value="<?php echo $usuario->rut_usuario ?>"    class="form-control"/>
            Rut: <input type="text" name="rutUsuario" value="<?php echo $usuario->rut_usuario ?>"    class="form-control"/>
            Nombre: <input type="text" name="nombreUsuario" value="<?php echo $usuario->nombre_usuario ?>" class="form-control"/>
            estado Usuario: <input type="number" name="estadoUsuario" value="<?php echo $usuario->estado_usuario ?>" class="form-control"/>
            emailUsuario: <input type="text" name="emailUsuario" value="<?php echo $usuario->mail_usuario ?>" class="form-control"/>
            idRol: <input type="number" name="idRol" value="<?php echo $usuario->id_rol ?>" class="form-control"/>
            Contraseña: <input type="password" name="password" value="<?php echo $usuario->password_usuario ?>" class="form-control"/>
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
    </body>
</html>