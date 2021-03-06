<!DOCTYPE HTML>
<html lang="es" style="background-color:#012C56;">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            .container{
                position: absolute;
                top: 20%;
                width: 100%;

            }
            footer {
                padding-top:10px;
                width:100%;
                top: 100%;
                height:60px;
                position:absolute;
                bottom:0;
                border-top: solid 5px #FAAF3A;
            }
        </style>
    </head>

    <body>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <div class="container">
            <div class="panel panel-default center-block">

                <div class="panel-footer">
                    <form action="<?php echo $helper->url("materiales", "index"); ?>" method="post">
                        <div class="form-group">
                            <label>Buscar por nombre: </label>
                            <input type="text" class="form-control" name="name" class="form-control"/>
                        </div>        
                        <div class="form-group">
                            <input type="submit"  value="Buscar" class="btn btn-default"/>
                        </div>  
                    </form>

                    <div class="form-group">
                        <?php
                        if (isset($result)) {
                            if ($num_registros != 0) {
                                ?>

                                <table class="table">
                                    <thead>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Accion</th>
                                    <th>Imagen</th>
                                    </thead>
                                    <tbody> 
                                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                                <td><?php echo $row['id_material']; ?></td>
                                                <td><?php echo $row['nombre_material']; ?></td>
                                                <td><?php echo $row['stock_material']; ?></td>
                                                <td>       
                                                    <a data-toggle="modal" href="#myModal<?php echo $row['id_material']; ?>" class="btn btn-default">Solicitar</a>
                                                    <div class="modal fade" id="myModal<?php echo $row['id_material']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" >
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title">Solicitar</h4>
                                                                </div>
                                                                <form  method="post" action="<?php echo $helper->url("prestamos", "prestamoProfesor"); ?>">
                                                                    <div class="modal-body" >
                                                                        <div class="form-group">
                                                                            <label for="obs">ID Material a Solicitar</label>
                                                                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $row['id_material']; ?>" name="id_material" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="cantidad">Cantidad</label>
                                                                            <?php $maximo=$row['stock_material']-1 ; ?>
                                                                            <input type="number" class="form-control" min="1" max="<?php echo $maximo; ?>" id="cant" name="cant" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="obs">Observación</label>
                                                                            <input maxlength="64" type="text" class="form-control" name="observacion">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="submit"  value="Confirmar" class="btn btn-default"/>
                                                                        </div> 
                                                                    </div>   
                                                                </form>
                                                            </div>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                    </div>
                                                </td>
                                                <?php
                                                $foto = $row['imagen'];
                                                $Base64Img = base64_decode($foto);
                                                ?>
                                                <td>
                                                    <a data-toggle="modal" name="myModalImagebtn<?php echo $row['id_material']; ?>" id="myModalImagebtn<?php echo $row['id_material']; ?>" href="#myModalImage<?php echo $row['id_material']; ?>" title="Ver Imagen" class="btn">Ver Imagen</a>
                                                    <div id="myModalImage<?php echo $row['id_material']; ?>" class="modal fade" role="dialog">  
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">      
                                                                <div class="modal-header">        
                                                                    <button type="button" class="close" data-dismiss="modal">×</button>        
                                                                    <h4 class="modal-title"><?php echo $row['nombre_material']; ?></h4>      </div> 
                                                                <center>
                                                                    <div class="modal-body"><img id="imagenPop" src="data:image/png;base64,<?php echo $foto; ?>" class="img-rounded" width="304" height="236" />   </div>      
                                                                    <div class="modal-footer">        
                                                                </center>
                                                                     
                                                            </div>  
                                                        </div>  
                                                    </div>    
                                                    </div>
                                                </td>   
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>               

                            <?php } else { ?>
                                <p class="alert alert-warning">No hay resultados</p>
                                <?php
                            };
                            $paginacion->render();
                        }
                        ?>

                    </div>
                </div>
            </div>
        <footer><center><img src="view/img/logo.png" alt="Duoc Uc"/><center></footer>
        </div>

        


                    </body>

                    </html>
