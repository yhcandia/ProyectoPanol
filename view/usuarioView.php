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
        <form action="<?php echo $helper->url("usuarios","crear"); ?>" method="post" class="col-lg-5">
            <h3>Añadir usuario</h3>
            <hr/>
            Rut: <input type="text" name="rutUsuario" class="form-control"/>
            Nombre: <input type="text" name="nombreUsuario" class="form-control"/>
            estadoUsuario: <input type="number" name="estadoUsuario" class="form-control"/>
            emailUsuario: <input type="text" name="emailUsuario" class="form-control"/>
            idRol: <input type="number" name="idRol" class="form-control"/>
            Contraseña: <input type="password" name="password" class="form-control"/>
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
        
        <section class="col-lg-7 usuario" style="height:400px;overflow-y:scroll;">
            <?php foreach($allusers as $user) {?>
                <?php echo $user->rut_usuario; ?> -
                <?php echo $user->nombre_usuario; ?> -
                <?php echo $user->estado_usuario; ?> -
                <?php echo $user->mail_usuario; ?> -
                <?php echo $user->id_rol; ?> -

                <div class="right">
                    <a href="<?php echo $helper->url("usuarios","borrar"); ?>&id=<?php echo $user->rut_usuario; ?>" class="btn btn-danger">Borrar</a>
                    <a href="<?php echo $helper->url("usuarios","actualizar"); ?>&id=<?php echo $user->rut_usuario; ?>" class="btn btn-info">Actualizar</a>
                </div>
                <hr/>
            <?php } ?>
        </section>
        
        
        
        
    </body>
</html>