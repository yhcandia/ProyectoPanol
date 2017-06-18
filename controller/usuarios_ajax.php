<?php
    # conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', 'avaras08', 'bd_panol');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		include 'paginador.php'; //incluir el archivo de paginación
		//las variables de paginación
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM usuarios ");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'usuarioView.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($con,"SELECT * FROM usuarios LIMIT $offset,$per_page");
		
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
                <div class="panel panel-default col-md-8 center-block">
                    <div class="panel-body ">Datos Usuario</div>
                      <div class="panel-footer">   
                        <table class="table">
                    
                            <thead>
				<th></th>
                                <th>rut</th>
                                <th>nombre</th>
                                <th>estado</th>
                                <th>email</th>
                                <th>rol</th>
                                <th></th>
                            </thead>
                            <tbody>                          
                            <?php
                            while($row = mysqli_fetch_array($query)){                         
                                    ?>                                 
                                    <tr>
                                            <td><span class="glyphicon glyphicon-user"></span></td>
                                            <td><?php echo $row['rut_usuario'];?></td>
                                            <td><?php echo $row['nombre_usuario'];?></td>
                                            <td><?php echo $row['estado_usuario'];?></td>
                                            <td><?php echo $row['mail_usuario'];?></td>
                                            <td><?php echo $row['id_rol'];?></td>                                           
                                            <td><input type="radio" id="valor1" name="valor1" value="<?php echo $row['rut_usuario'];?>" /></td>
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
                <div class=" pull-left">
                    <a data-toggle="modal" href="#ModalAgregar" title="Agregar" class="btn btn-success glyphicon glyphicon-plus"></a>
                    <a href="#" title="Remover" onClick="confirmarRemover($('#valorRadio').val())" class="btn btn-danger glyphicon glyphicon-remove"></a>
                    <a href="#" title="Editar" onClick="confirmarEditar($('#valorRadio').val())" class="btn btn-info glyphicon glyphicon-edit"></a>      
                </div>
                </div>
			<?php
			
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}
	}
?>
