<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Mantenedor Prestamos</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
        <title>.: Prestamos :.</title>
        <style>
        </style>
        <script language="javascript" type="text/javascript">
            function confirmarRemover(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar un prestamo");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea dar de baja el registro?");
                    if (ventana) {
                        window.location.href="<?php echo $helper->url("prestamos", "borrar"); ?>&id="+id;
                    }
                }
            }
        </script>
        <script language="javascript" type="text/javascript">
            function confirmarRecibido(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar un prestamo");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea cambiar el estado del prestamo?");
                    if (ventana) {
                        window.location.href="<?php echo $helper->url("prestamos", "recibido"); ?>&id="+id;
                    }
                }
            }
        </script>
        <script language="javascript" type="text/javascript">
            function confirmarPorConfirmar(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar un prestamo");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea cambiar el estado del prestamo?");
                    if (ventana) {
                        window.location.href="<?php echo $helper->url("prestamos", "porConfirmar"); ?>&id="+id;
                    }
                }
            }
        </script>
        
        
        
        
        <script type="text/javascript">
            $(document).ready(function(){
                $("select[name=idMaterial]").click(function () {                              
                              $("#cantidad").attr("max", ($( "#idMaterial option:selected" ).attr("value2")-1));
                          });
            }); 
            </script>
        <script language="javascript" type="text/javascript">
            function confirmarEditar(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar prestamo");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea actualizar el registro?");
                    if (ventana) {    
                        var valida='1';
                        window.location.href="<?php echo $helper->url("prestamos", "actualizar"); ?>&id="+id;            
                    }
                }
            }
            function confirmarPendiente(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar prestamo");                  
                }else{
                    ventana = confirm("Favor indique fecha de devolucion");
                    if (ventana) {
                        var valida='2';
                        window.location.href="<?php echo $helper->url("prestamos", "actualizar"); ?>&id="+id;            
                    }
                }
            }
            
            
            
            function actualiza(){
                var valida = <?php echo intval(isset($_GET['id']))?>;                     
                if(valida=='1'){   
                    setTimeout(function(){ $("#modEditar").click(); }, 1000);
                    return true;

                }
                
                else{
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
			url:'controller/prestamos_ajax.php',
			data: parametros,			 
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
                                var $variable = "holamundo"
			}
		})
	}
        
            
	</script>
        
        <style>
            .container .panel {
                position: absolute;
                top: 280%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
            }
            .principal{
                position:relative;
            }
            footer {
                left:0px;
                padding-top:10px;
                width:100%;
                top: 560%;
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
                                    <h4 class="modal-title">Crear Prestamo</h4>
                                    <h5><font color="red">Todos los campos son obligatorios</font></h5>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post" action="<?php echo $helper->url("prestamos", "crear"); ?>">
                                         
                                        <div class="form-group"><label>Seleccione solicitante: </label>
                                          
                                            <select class="form-control" name="rutUsuario" required="">
                                            <option value="">-- Seleccione --</option>
                                            <?php
                                            $usuarios = include('listas/mostrarUsuarios.php');
                                            while ($row = mysqli_fetch_row($usuarios)) {
                                                ?>

                                            <option value="<?php echo $row[0] ?>"  ><?php echo $row[2]." ".$row[3]; ?></option>
                                                
                                                <?php
                                            }
                                            ?>
						</select></div>
                                        

                                        <div class="form-group"><label>Seleccione material: </label>
                                          
                                            <select class="form-control" onchange="ShowSelected();" name="idMaterial" required="" id="idMaterial" >
                                            <option value="">-- Seleccione --</option>
                                            <?php
                                            $materiales = include('listas/mostrarMateriales.php');
                                            while ($row = mysqli_fetch_row($materiales)) {
                                                ?>

                                            <option  value="<?php echo $row[0] ?>" value2="<?php echo $row[4] ?>" ><?php echo $row[2] ?></option>

                                                <?php
                                            }
                                            ?>
						</select></div>
                                        
                                        <div class="form-group"><label>Cantidad: </label> <input type="number"  min='1' id="cantidad" class="form-control" name="cantidad" required=""/></div>
                                            <div class="form-group"><label >Fecha de prestamo:</label>
                                            					
                                                    <p><input min="2016-01-01" max="2018-12-31" value="<?php echo date('Y-m-d');?>" type="date" class="form-control" name="fechaPrestamo"/></p>

                                            </div>
                                            <div class="form-group"><label >Fecha de devolucion:</label>
                                            					
                                                    <p><input min="2016-01-01" max="2018-12-31" value="<?php echo date('Y-m-d');?>" type="date" class="form-control" name="fechaDevolucion"/></p>
                                            </div>
                                            <div class="form-group"><label>Observacion: </label> <input maxlength="64" type="text" class="form-control" name="observacion"/></div>
                                            <div class="form-group"><label>Estado de prestamo: </label>
                                                <select class="form-control" name="estadoPrestamo" required=""/>
                                                        <option value="">-- Seleccione --</option>
                                                        <option  class="form-control" value="0"> Desactivado </option>
                                                        <option  class="form-control" value="1"> Finalizado </option>
                                                        <option  class="form-control" value="2"> Pendiente </option>
                                                        <option  class="form-control" value="3"> Por Confirmar </option>
                                                    </select></div>
                                            
                                        <button type="submit" class="btn btn-default">Agregar</button>
                                    </form>
                                </div>
                                
                                

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->   
                    
                    
                    
                    
                    
                    <div class="modal fade" id="ModalPendiente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Definir fecha limite</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="<?php echo $helper->url("prestamos","limite"); ?>" method="post">
                                        <div class="form-group"><input type="hidden" name="idPrestamo" value="<?php echo $prestamo->id_prestamo ?>"    class="form-control"/></div>
                                    
                                            <div class="form-group"><label >Fecha de devolucion:</label>
                                            					
                                                    <p><input min="2016-01-01" max="2018-12-31" value="<?php echo date('Y-m-d',strtotime($prestamo->fecha_limite)) ?>" type="date" class="form-control" name="fechaDevolucion"/></p>
                                            </div>
                                        
                                        <div class="form-group"><label>Observacion:</label> <input type="text" name="observacion" value="<?php echo $prestamo->observacion ?>"    class="form-control"/></div>
                                
                                
                                        
                                        
                                        <button type="submit" class="btn btn-default">Aceptar</button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    
                    
                  
                    <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Editar</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="<?php echo $helper->url("prestamos","update"); ?>" method="post">
                                        <div class="form-group"><label>ID Prestamo:</label> <div class="form-group"><input type="text" name="idPrestamo" value="<?php echo $prestamo->id_prestamo ?>" readonly="" class="form-control"/></div>
                                        
                                            <div class="form-group"><label>RUT Usuario:</label> <input type="text" name="rutUsuario" value="<?php echo $prestamo->rut_usuario ?>" readonly class="form-control"/></div>
                                                
                                            <div class="form-group"><label>ID Material:</label> <input type="text" name="idMaterial" value="<?php echo $prestamo->id_material ?>" readonly class="form-control"/></div>
                                            <div class="form-group"><label>Cantidad:</label> <input type="text" id="cantidad" min='1' max='1' name="cantidad" value="<?php echo $prestamo->cantidad ?>" readonly="" class="form-control"/></div>
                                        
                                        <div class="form-group"><label >Fecha de presamo:</label>
                                            					
                                            <p><input readonly=" "min="2016-01-01" max="2018-12-31" value="<?php echo date('Y-m-d',strtotime($prestamo->fecha_prestamo)) ?>" type="date" class="form-control" name="fechaPrestamo"/></p>
                                            </div>
                                        
                                            <div class="form-group"><label >Fecha de devolucion:</label>
                                            					
                                                    <p><input min="<?php echo date('Y-m-d',strtotime($prestamo->fecha_prestamo)) ?>" max="2018-12-31" value="<?php echo date('Y-m-d',strtotime($prestamo->fecha_prestamo)) ?>" type="date" class="form-control" name="fechaDevolucion"/></p>
                                            </div>
                                        
                                        <div class="form-group"><label>Observacion:</label> <input type="text" name="observacion" value="<?php echo $prestamo->observacion ?>"  class="form-control"/></div>
                                
                                
                                        <div class="form-group"><label>Estado: </label>
                                            <select name="estadoPrestamo" class="form-control" required=""/>
                                                        <option value="">-- Seleccione --</option>
                                                        <?php if ($prestamo->estado_prestamo == 0) {?>
                                                        <option  class="form-control" value="0" selected> Desactivado </option>
                                                        <option  class="form-control" value="1"> Finalizado </option>
                                                        <option  class="form-control" value="2"> Pendiente </option>
                                                        <option  class="form-control" value="3"> Por Confirmar </option>
                                                        <?php } 
                                                        
                                                        if ($prestamo->estado_prestamo == 1) {?>
                                                        <option  class="form-control" value="0"> Desactivado </option>
                                                        <option  class="form-control" value="1" selected > Finalizado </option>
                                                        <option  class="form-control" value="2"> Pendiente </option>
                                                        <option  class="form-control" value="3"> Por Confirmar </option>
                                                        <?php }
                                                        
                                                        if ($prestamo->estado_prestamo == 2) {?>
                                                        <option  class="form-control" value="0"> Desactivado </option>
                                                        <option  class="form-control" value="1"> Finalizado </option>
                                                        <option  class="form-control" value="2" selected> Pendiente </option>
                                                        <option  class="form-control" value="3"> Por Confirmar </option>
                                                        <?php }
                                                        
                                                        if ($prestamo->estado_prestamo == 3) {?>
                                                        <option  class="form-control" value="0"> Desactivado </option>
                                                        <option  class="form-control" value="1"> Finalizado </option>
                                                        <option  class="form-control" value="2" selected> Pendiente </option>
                                                        <option  class="form-control" value="3" > Por Confirmar </option>
                                                        <?php }?>
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
              <div style="display: none;">
                   <a data-toggle="modal" id="modPendiente" href="#ModalPendiente" title="Agregar" class="btn btn-success glyphicon glyphicon-plus"></a>
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