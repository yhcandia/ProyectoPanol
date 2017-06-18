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
                if(id=='sinValor'){
                    alert("Debe seleccionar un usuario");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea eliminar el registro?");
                    if (ventana) {
                        window.location.href="<?php echo $helper->url("usuarios", "borrar"); ?>&id="+id;
                    }
                }
            }
        </script>
        <script>
	$(document).ready(function(){
		load(1);  
	}); 
	function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'controller/usuarios_ajax.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='view/img/loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
	</script>  
        <style>
            .container .panel {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            }
        </style>
    </head>
    <body>
    <center>
        <?php if (!isset($actualizar)){
                                    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Editar</h4>
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
                </div>
            </div>
              <!--listado de usuario desde Ajax con paginador-->
            <div class="outer_div">
                    <div id="loader" class="text-center"></div><!-- Datos ajax Final -->           
            </div>  
            <div>     
              
                <input type="hidden" value="sinValor" id="valorRadio" name="valorRadio">
                <a data-toggle="modal" href="#ModalAgregar" title="Agregar" class="btn btn-success glyphicon glyphicon-plus"></a>
                <a href="#" title="Remover" onClick="confirmation($('#valorRadio').val())" class="btn btn-danger glyphicon glyphicon-remove"></a>
                <a href="<?php echo $helper->url("usuarios","actualizar"); ?>&id=<?php echo $valorRadio; ?>" title="Editar" class="btn btn-info glyphicon glyphicon-edit"></a>      
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