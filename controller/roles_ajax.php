<?php
    # conectare la base de datos
    $db_cfg = require_once '../config/database.php';
    $con=@mysqli_connect($db_cfg["host"],$db_cfg["user"], $db_cfg["pass"], $db_cfg["database"]);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
        $con->query("SET NAMES utf8");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		include 'paginador.php'; //incluir el archivo de paginación
		//las variables de paginación
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM rol ");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'rolView.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($con,"SELECT * FROM rol LIMIT $offset,$per_page");
		
		if ($numrows>0){
			?>
                <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>        
                <script>
                    $(document).ready(function()
                      {
                          $("input[name=valor1]").click(function () {                              
                              $("#valorRadio").attr("value", $('input:radio[name=valor1]:checked').val());
                          });
                      });
                </script>
                <div class="panel panel-default col-md-16 center-block">
                    <div class="panel-body ">Roles en el sistema</div>
                      <div class="panel-footer">   
                        <table class="table">
                    
                            <thead>
				<th></th>
                                <th>ID Rol</th>
                                <th>Nombre</th>
                                <th>Estado del rol</th>
                                <th>Seleccionar</th>
                            </thead>
                            <tbody>                          
                            <?php
                            while($row = mysqli_fetch_array($query)){                         
                                    ?>                                 
                                    <tr>
                                            <td><span class="icon-users"></span></td>
                                            <td><?php echo $row['id_rol'];?></td>                                           
                                            <td><?php echo $row['nombre_rol'];?></td>                                                                                 
                                            <?php if ($row['estado_rol']==1){?>
                                            <td><?php echo "Activo";?></td>
                                            <?php }else{?>
                                            <td><?php echo "Inactivo";?></td>
                                            <?php } ?>
                                            <td><input type="radio" id="valor1" name="valor1" value="<?php echo $row['id_rol'];?>" /></td>
                                    </tr>                                 
                                   <?php
                            }
                            ?>
                            </tbody>
                        </table>               
		<div class="table-pagination pull-right">
			<?php echo paginate($reload, $page, $total_pages, $adjacents);?>  
		</div>     
                      </div>    
                    <div class="pull-left" style="bottom:20px;position: absolute;">
                    
                    <a href="#" title="Desactivar" onClick="confirmarRemover($('#valorRadio').val())" class="btn btn-danger glyphicon glyphicon-ban-circle"></a>
                    <a href="#" title="Editar" onClick="confirmarEditar($('#valorRadio').val())" class="btn btn-info glyphicon glyphicon-edit"></a>      
                </div>
                </div>
			<?php
			
		} else {
			?>
		 <div class="panel panel-default col-md-8 center-block">
                    <div class="panel-body">                
                    <h4>Aviso!!!</h4> No hay datos para mostrar<br>
                    <a data-toggle="modal" href="#ModalAgregar" title="Agregar" class="btn btn-success glyphicon glyphicon-plus"></a>
                    </div>
                </div>
			<?php
		}
	}
?>
