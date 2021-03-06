<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Mantenedor Roles</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <title>.: Roles :.</title>
        <style>
        </style>
        <script language="javascript" type="text/javascript">
            function confirmarRemover(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar un rol");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea desactivar el rol?");
                    if (ventana) {
                        window.location.href="<?php echo $helper->url("roles", "borrar"); ?>&id="+id;
                    }
                }
            }
        </script>
        <script language="javascript" type="text/javascript">
            function confirmarEditar(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar un rol");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea actualizar el rol?");
                    if (ventana) {     
                        window.location.href="<?php echo $helper->url("roles", "actualizar"); ?>&id="+id;            
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
		$.ajax({
			url:'controller/roles_ajax.php',
			data: parametros,			
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
                top: 250%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
            }
            .principal{
                position:relative;
            }
            footer {
                padding-top:10px;
                width:100%;
                top: 520%;
                height:60px;
                position:absolute;
                bottom:0;
                border-top: solid 5px #FAAF3A;
            }
        </style>
    </head>
    <body style="background-color:#012C56;" onload="actualiza()">
    <center>
        <div class="principal">
        <div class="container" style="padding-bottom:100px;">           
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Agregar</h4>
                                    <h5><font color="red">Todos los campos son obligatorios</font></h5>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post" action="<?php echo $helper->url("roles", "crear"); ?>">

                                        <div class="form-group"><label>Nombre rol: </label> <input maxlength="32" required="" type="text" class="form-control" name="nombreRol"/></div>
                                        <div class="form-group"><label>Estado: </label>
                                                        <select name="estadoRol" class="form-control" name="estadoRol"/>
                                                        <option  class="form-control" value="1"> Activo </option>
                                                        <option  class="form-control" value="0"> Desactivado </option>
                                                    </select></div>
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
                                    <form role="form" action="<?php echo $helper->url("roles","update"); ?>" method="post">
                                        <div class="form-group"><input type="hidden" name="idRol" value="<?php echo $rol->id_rol ?>"    class="form-control"/></div>
                                        <div class="form-group"><label>Nombre rol:</label> <input maxlength="32" required="" type="text" name="nombreRol" value="<?php echo $rol->nombre_rol ?>" class="form-control"/></div>
                                        <div class="form-group"><label>Estado: </label>
                                                        <select name="estadoRol" class="form-control" name="estadoRol"/>
                                                        <?php if ($rol->estado_rol == 1) {?>
                                                        <option  class="form-control" value="1" selected> Activo </option>
                                                        <option  class="form-control" value="0"> Desactivado </option>
                                                        <?php } else{ ?>
                                                        <option  class="form-control" value="1" > Activo </option>
                                                        <option  class="form-control" value="0" selected> Desactivado </option>
                                                        <?php } ?>
                                                    </select></div>
                                        
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
            <footer><center><img src="view/img/logo.png" alt="Duoc Uc"/><center></footer>
        </div>
    </center>
    </body>
</html>