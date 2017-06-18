<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <title>.: USUARIOS :.</title>

        <script language="javascript" type="text/javascript">
            function confirmation(id) {
                ventana = confirm("¿Esta seguro que desea eliminar el registro?");
                if (ventana) {

                    window.location.href="<?php echo $helper->url("usuarios", "borrar"); ?>&id="+id;
                }
            }
        </script>
    </head>
    <body>
    <center>
        <?php if (!isset($actualizar)){
                                    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>VER USUARIOS</h2>
                    <!-- Button trigger modal -->
                    
                    <br><br>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Agregar</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post" action="<?php echo $helper->url("usuarios", "crear"); ?>">

                                        <div class="form-group"><label>Rut: </label> <input type="text" class="form-control" name="rutUsuario" class="form-control"/></div>
                                        <div class="form-group"><label>Nombre: </label><input type="text" class="form-control" name="nombreUsuario" class="form-control"/></div>
                                        <div class="form-group"><label>estadoUsuario: </label><input type="number" class="form-control" name="estadoUsuario" class="form-control"/></div>
                                        <div class="form-group"><label>emailUsuario: </label><input type="text" class="form-control" name="emailUsuario" class="form-control"/></div>
                                        <div class="form-group"><label>idRol: </label><input type="number" class="form-control" name="idRol" class="form-control"/></div>
                                        <div class="form-group"><label>Contraseña: </label><input type="password" class="form-control" name="password" class="form-control"/></div>
                                        <button type="submit" class="btn btn-default">Agregar</button>
                                    </form>
                                </div>
                                
                                

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    
                    
                    <?php foreach($allusers as $user) {?>
                    <?php echo $user->rut_usuario; ?> -
                    <?php echo $user->nombre_usuario; ?> -
                    <?php echo $user->estado_usuario; ?> -
                    <?php echo $user->mail_usuario; ?> -
                    <?php echo $user->id_rol; ?> -
                    
                <input type="radio" name="id" onclick="<?php $valorRadio=$user->rut_usuario ?> " value="<?php echo $user->rut_usuario; ?>">
                
                <hr/>
            <?php } ?>
                
                        <div class="right">
                            <a data-toggle="modal" href="#myModal" class="btn btn-default">Agregar</a>
                            <a href="#" onClick="confirmation('<?php echo $valorRadio; ?>')" class="btn btn-danger">Borrar</a>
                            <a href="<?php echo $helper->url("usuarios","actualizar"); ?>&id=<?php echo $valorRadio; ?>" class="btn btn-info">Actualizar</a>
                        </div>

                </div>
            </div>
        </div>
        <?php } else{ ?>
        
        
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
                                <?php } ?>


    </center>

</body>
</html>