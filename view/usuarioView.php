<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <title>.: USUARIOS :.</title>
        <style>
        </style>
        <script language="javascript" type="text/javascript">
            function confirmarRemover(id) {
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
        <script language="javascript" type="text/javascript">
            function confirmarEditar(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar un usuario");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea actualizar el registro?");
                    if (ventana) {     
                        window.location.href="<?php echo $helper->url("usuarios", "actualizar"); ?>&id="+id;            
                    }
                }
            }
            function actualiza(){
                var valida = <?php echo intval(isset($_GET['id']))?>;            
                if(valida=='1'){   
                    setTimeout(function(){ $("#modEditar").click(); }, 1000);
                                   
                    return true;
                }else{
                    return false;
                }
            }
        </script>
        <script>
	$(document).ready(function(){
                $("#valorRadio").attr("value", "sinValor");
		load(1);  
	}); 
	function load(page){
                $("#valorRadio").attr("value", "sinValor");
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
            height: 50%;
            transform: translateX(-50%) translateY(-50%);
            }
        </style>
    </head>
    <body onload="actualiza()">
    <center>
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

                                        <div class="form-group"><label>Rut: </label> <input type="text" class="form-control" name="rutUsuario"/></div>
                                        <div class="form-group"><label>Nombre: </label><input type="text" class="form-control" name="nombreUsuario"/></div>
                                        <div class="form-group"><label>estadoUsuario: </label><input type="number" class="form-control" name="estadoUsuario"/></div>
                                        <div class="form-group"><label>emailUsuario: </label><input type="text" class="form-control" name="emailUsuario"/></div>
                                        <div class="form-group"><label>idRol: </label><input type="number" class="form-control" name="idRol"/></div>
                                        <div class="form-group"><label>Contraseña: </label><input type="password" class="form-control" name="password"/></div>
                                        <button type="submit" class="btn btn-default">Agregar</button>
                                    </form>
                                </div>
                                
                                

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->                   
                    <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Editar</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="<?php echo $helper->url("usuarios","update"); ?>" method="post">
                                        <div class="form-group"><input type="hidden" name="rut" value="<?php echo $usuario->rut_usuario ?>"    class="form-control"/></div>
                                        <div class="form-group"><label>Rut:</label> <input type="text" name="rutUsuario" value="<?php echo $usuario->rut_usuario ?>"    class="form-control"/></div>
                                        <div class="form-group"><label>Nombre:</label> <input type="text" name="nombreUsuario" value="<?php echo $usuario->nombre_usuario ?>" class="form-control"/></div>
                                        <div class="form-group"><label>estado Usuario:</label> <input type="number" name="estadoUsuario" value="<?php echo $usuario->estado_usuario ?>" class="form-control"/></div>
                                        <div class="form-group"><label>emailUsuario:</label> <input type="text" name="emailUsuario" value="<?php echo $usuario->mail_usuario ?>" class="form-control"/></div>
                                        <div class="form-group"><label>idRol:</label> <input type="number" name="idRol" value="<?php echo $usuario->id_rol ?>" class="form-control"/></div>
                                        <div class="form-group"><label>Contraseña:</label> <input type="password" name="password" value="<?php echo $usuario->password_usuario ?>" class="form-control"/></div>
                                        <button type="submit" class="btn btn-default">Editar</button>
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
              <div style="display: none;">
                   <a data-toggle="modal" id="modEditar" href="#ModalEditar" title="Agregar" class="btn btn-success glyphicon glyphicon-plus"></a>
              </div>
            <div>                  
                <input type="hidden" value="sinValor" id="valorRadio" name="valorRadio">              
            </div>
        </div>
    </center>

</body>
</html>