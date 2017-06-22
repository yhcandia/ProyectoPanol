<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <title>.: PROVEEDORES :.</title>
        <style>
        </style>
        <script language="javascript" type="text/javascript">
            function confirmarRemover(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar un proveedor");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea desactivar el proveedor seleccionado?");
                    if (ventana) {
                        window.location.href="<?php echo $helper->url("proveedores", "borrar"); ?>&id="+id;
                    }
                }
            }
        </script>
        <script language="javascript" type="text/javascript">
            function confirmarEditar(id) {
                if(id=='sinValor'){
                    alert("Debe seleccionar un proveedor");                  
                }else{
                    ventana = confirm("¿Esta seguro que desea actualizar el proveedor seleccionado?");
                    if (ventana) {     
                        window.location.href="<?php echo $helper->url("proveedores", "actualizar"); ?>&id="+id;            
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
			url:'controller/proveedores_ajax.php',
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
        <script language="javascript" type="text/javascript">
            function revisarDigito( dvr )
{	
	dv = dvr + ""	
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
	{		
		alert("Debe ingresar un digito verificador valido");		
		window.document.form1.rutProveedor.focus();		
		window.document.form1.rutProveedor.select();		
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
		window.document.form1.rutProveedor.focus();		
		window.document.form1.rutProveedor.select();		
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
		window.document.form1.rutProveedor.focus();		
		window.document.form1.rutProveedor.select();		
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
		window.document.form1.rutProveedor.focus();		
		window.document.form1.rutProveedor.select();		
		return false;	
	}	

	for (i=0; i < largo ; i++ )	
	{			
		if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
 		{			
			alert("El valor ingresado no corresponde a un R.U.T valido");			
			window.document.form1.rutProveedor.focus();			
			window.document.form1.rutProveedor.select();			
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

	window.document.form1.rutProveedor.value = invertido.toUpperCase()		

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
                                </div>
                                <div class="modal-body">
                                    <form name="form1" role="form" method="post" action="<?php echo $helper->url("proveedores", "crear"); ?>" onSubmit="javascript:return Rut(document.form1.rutProveedor.value)">

                                        <div class="form-group"><label>RUT: </label> <input maxlength="12" required="" type="text" class="form-control" name="rutProveedor"/></div>
                                        <div class="form-group"><label>Nombre: </label><input maxlength="64" required="" type="text" class="form-control" name="nombreProveedor"/></div>
                                        <div class="form-group"><label>Estado: </label>
                                                        <select name="estadoProveedor" class="form-control" name="estadoProveedor"/>
                                                        <option  class="form-control" value="1"> Activo </option>
                                                        <option  class="form-control" value="0"> Desactivado </option>
                                                    </select></div>
                                        <div class="form-group"><label>Direccion: </label><input maxlength="128" required="" type="text" class="form-control" name="direccionProveedor"/></div>
                                        
                                        <input type="submit" class="btn btn-default" value="Agregar">
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
                                    <form role="form" action="<?php echo $helper->url("proveedores","update"); ?>" method="post">
                                        <div class="form-group"><input type="hidden" name="rut" value="<?php echo $proveedor->rut_proveedor ?>"  class="form-control"/></div>
                                        <div class="form-group"><label>RUT:</label> <input maxlength="12" type="text" name="rutProveedor" readonly="" value="<?php echo $proveedor->rut_proveedor ?>"    class="form-control"/></div>
                                        <div class="form-group"><label>Nombre:</label> <input maxlength="64" required="" type="text" name="nombreProveedor" value="<?php echo $proveedor->nombre_proveedor ?>" class="form-control"/></div>
                                        <div class="form-group"><label>Estado: </label>
                                                        <select name="estadoProveedor" class="form-control" name="estadoProveedor"/>
                                                        <?php if ($proveedor->estado_proveedor == 1) {?>
                                                        <option  class="form-control" value="1" selected> Activo </option>
                                                        <option  class="form-control" value="0"> Desactivado </option>
                                                        <?php } 
                                                        
                                                        if ($proveedor->estado_proveedor == 0) {?>
                                                        <option  class="form-control" value="1" > Activo </option>
                                                        <option  class="form-control" value="0" selected> Desactivado </option>
                                                        <?php } ?>
                                                        
                                                    </select></div>
                                        <div class="form-group"><label>Direccion:</label> <input maxlength="128" required="" type="text" name="direccionProveedor" value="<?php echo $proveedor->direccion_proveedor ?>" class="form-control"/></div>
                                        
                                        <button type="submit" class="btn btn-default">Editar</button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal --> 
                </div>
            </div>
              <!--listado de proveedores desde Ajax con paginador-->
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