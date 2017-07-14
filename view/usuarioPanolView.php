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
        <script type="text/javascript" src="js/validarut.js"></script>
        <script language="javascript" type="text/javascript">
            function confirmarRemover(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar un usuario");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea desactivar el usuario seleccionado?");
                    if (ventana) {
                        window.location.href="<?php echo $helper->url("usuariosPanol", "borrar"); ?>&id="+id;
                    }
                }
            }
        </script>
        <script language="javascript" type="text/javascript">
            function confirmarEditar(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar un usuario");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea actualizar el usuario seleccionado?");
                    if (ventana) {     
                        window.location.href="<?php echo $helper->url("usuariosPanol", "actualizar"); ?>&id="+id;            
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
			url:'controller/usuariosPanol_ajax.php',
			data: parametros,			 
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
	</script>  
        <script language="javascript" type="text/javascript">
            function revisarDigito( dvr )
{	
	dv = dvr + ""	
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
	{		
		alert("Debe ingresar un digito verificador valido");		
		window.document.form1.rutUsuario.focus();		
		window.document.form1.rutUsuario.select();		
		return false;	
	}	
	return true;
}

function revisarDigito2( crut )
{	
	largo = crut.length;	
	if ( largo < 2 )	
	{		
		alert("Debe ingresar el rut completo")		
		window.document.form1.rutUsuario.focus();		
		window.document.form1.rutUsuario.select();		
		return false;	
	}	
	if ( largo > 2 )		
		rut = crut.substring(0, largo - 1);	
	else		
		rut = crut.charAt(0);	
	dv = crut.charAt(largo-1);	
	revisarDigito( dv );	

	if ( rut == null || dv == null )
		return 0	

	var dvr = '0'	
	suma = 0	
	mul  = 2	

	for (i= rut.length -1 ; i >= 0; i--)	
	{	
		suma = suma + rut.charAt(i) * mul		
		if (mul == 7)			
			mul = 2		
		else    			
			mul++	
	}	
	res = suma % 11	
	if (res==1)		
		dvr = 'k'	
	else if (res==0)		
		dvr = '0'	
	else	
	{		
		dvi = 11-res		
		dvr = dvi + ""	
	}
	if ( dvr != dv.toLowerCase() )	
	{		
		alert("EL rut es incorrecto")		
		window.document.form1.rutUsuario.focus();		
		window.document.form1.rutUsuario.select();		
		return false	
	}

	return true
}

function Rut(texto)
{	
	var tmpstr = "";	
	for ( i=0; i < texto.length ; i++ )		
		if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
			tmpstr = tmpstr + texto.charAt(i);	
	texto = tmpstr;	
	largo = texto.length;	

	if ( largo < 2 )	
	{		
		alert("Debe ingresar el rut completo")		
		window.document.form1.rutUsuario.focus();		
		window.document.form1.rutUsuario.select();		
		return false;	
	}	

	for (i=0; i < largo ; i++ )	
	{			
		if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
 		{			
			alert("El valor ingresado no corresponde a un R.U.T valido");			
			window.document.form1.rutUsuario.focus();			
			window.document.form1.rutUsuario.select();			
			return false;		
		}	
	}	

	var invertido = "";	
	for ( i=(largo-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + texto.charAt(i);	
	var dtexto = "";	
	dtexto = dtexto + invertido.charAt(0);	
	dtexto = dtexto + '-';	
	cnt = 0;	

	for ( i=1,j=2; i<largo; i++,j++ )	
	{		
		//alert("i=[" + i + "] j=[" + j +"]" );		
		if ( cnt == 3 )		
		{			
			dtexto = dtexto + '.';			
			j++;			
			dtexto = dtexto + invertido.charAt(i);			
			cnt = 1;		
		}		
		else		
		{				
			dtexto = dtexto + invertido.charAt(i);			
			cnt++;		
		}	
	}	

	invertido = "";	
	for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + dtexto.charAt(i);	

	window.document.form1.rutUsuario.value = invertido.toUpperCase()		

	if ( revisarDigito2(texto) )		
		return true;	

	return false;
        }</script>
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
                top: 580%;
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
                                    <form role="form" name="form1" method="post" action="<?php echo $helper->url("usuarios", "crear"); ?>" onSubmit="javascript:return Rut(document.form1.rutUsuario.value)">

                                        <div class="form-group"><label>RUT: </label> <input maxlength="12" required="" type="text" name="rutUsuario" class="form-control" /></div>
                                        <div class="form-group"><label>Nombre: </label><input maxlength="32" required="" type="text" class="form-control" name="nombreUsuario"/></div>
                                        <div class="form-group"><label>Apellido: </label><input maxlength="32" required="" type="text" class="form-control" name="apellidoUsuario"/></div>
                                        <div class="form-group"><label>Domicilio: </label><input maxlength="64" required="" type="text" class="form-control" name="domicilioUsuario"/></div>
                                        <div class="form-group"><label>Telefono: </label><input required="" type="number" min="200000000" max="999999999" class="form-control" name="telefonoUsuario"/></div>
                                        <div class="form-group"><label>Estado: </label>
                                                        <select name="estadoUsuario" class="form-control"/>
                                                        <option  class="form-control" value="1"> Activo </option>
                                                        <option  class="form-control" value="0"> Desactivado </option>
                                                    </select></div>
                                        <div class="form-group"><label>Email Usuario: </label><input maxlength="64" required="" type="email" class="form-control" name="emailUsuario"/></div>
                                        <div class="form-group"><label>Escuela: </label><input maxlength="32" required="" type="text" class="form-control" name="escuelaUsuario"/></div>
                                        <div class="form-group"><label>Rol: </label>
                                            <select name="idRol" class="form-control" required=""/> 
                                            <option value="">-- Seleccione --</option>
                                            <?php
                                            $roles = include('listas/mostrarRoles.php');
                                            while ($row = mysqli_fetch_row($roles)) {
                                                ?>
                                                <?php if ($row[0]!=1 && $row[0]!=0) {?>
                                                <option value="<?php echo $row[0] ?>"><?php echo $row[2] ?></option>
                                                <?php } ?>
                                                <?php
                                            }
                                            ?>
                                            </select></div>                                   
                                        <div class="form-group"><label>Contraseña: </label><input maxlength="32" required="" type="password" class="form-control" name="password"/></div>
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
                                        <div class="form-group"><input type="hidden" name="rut" value="<?php echo $usuario->rut_usuario ?>" class="form-control" readonly=""/></div>
                                        <div class="form-group"><label>RUT:</label> <input maxlength="12" required="" type="text" name="rutUsuario" value="<?php echo $usuario->rut_usuario ?>"    class="form-control"/></div>
                                        <div class="form-group"><label>Nombre:</label> <input maxlength="32" required="" type="text" name="nombreUsuario" value="<?php echo $usuario->nombre_usuario ?>" class="form-control"/></div>
                                        <div class="form-group"><label>Apellido:</label> <input maxlength="32" required="" type="text" name="apellidoUsuario" value="<?php echo $usuario->apellido_usuario ?>" class="form-control"/></div>
                                        <div class="form-group"><label>Domicilio:</label> <input maxlength="128" required="" type="text" name="domicilioUsuario" value="<?php echo $usuario->domicilio_usuario ?>" class="form-control"/></div>
                                        <div class="form-group"><label>Telefono:</label> <input type="number" min="200000000" max="999999999" required="" name="telefonoUsuario" value="<?php echo $usuario->telefono_usuario ?>" class="form-control"/></div>
                                        <div class="form-group"><label>Estado: </label>
                                                        <select name="estadoUsuario" class="form-control" name="estadoUsuario"/>
                                                        <?php if ($usuario->estado_usuario == 1) {?>
                                                        <option  class="form-control" value="1" selected> Activo </option>
                                                        <option  class="form-control" value="0"> Desactivado </option>
                                                        <?php } 
                                                        
                                                        if ($usuario->estado_usuario == 0) {?>
                                                        <option  class="form-control" value="1" > Activo </option>
                                                        <option  class="form-control" value="0" selected> Desactivado </option>
                                                        <?php } ?>
                                                    </select></div>
                                        <div class="form-group"><label>Email Usuario:</label> <input maxlength="64" required="" type="email" name="emailUsuario" value="<?php echo $usuario->mail_usuario ?>" class="form-control"/></div>
                                        <div class="form-group"><label>Escuela:</label> <input maxlength="32" required="" type="text" name="escuelaUsuario" value="<?php echo $usuario->escuela_usuario ?>" class="form-control"/></div>
                                        
                                        <div class="form-group"><label>Rol:</label>
                                            <select name="idRol" class="form-control" required=""/>     
                                            <option value="">-- Seleccione --</option>
                                        <?php
                                            $roless = include('listas/mostrarRoles.php');
                                            while ($row = mysqli_fetch_row($roless)) {
                                                
                                            if ($usuario->id_rol==$row[1]){?>
                                                <option selected value="<?php echo $row[0] ?>"><?php echo $row[2] ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $row[0] ?>"><?php echo $row[2] ?></option>
                                            <?php }
                                            }
                                            ?>
                                                </select></div>
                                        
                                        <div class="form-group"><label>Contraseña:</label> <input maxlength="32" type="password" name="password" placeholder="(no modificada)" class="form-control"/></div>
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