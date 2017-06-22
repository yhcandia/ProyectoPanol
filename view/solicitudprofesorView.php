<!DOCTYPE HTML>
<html lang="es" style="background-color:#012C56;">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
           
        </style>
    </head>
    
        <body>
            <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

            <div class="panel panel-default col-md-8 center-block">

                <div class="panel-footer">
                    <form action="<?php echo $helper->url("materiales", "index"); ?>" method="post">
                        <div class="form-group">
                            <label>Buscar: </label>
                            <input type="text" class="form-control" name="name" class="form-control"/>
                        </div>        
                        <div class="form-group">
                            <input type="submit"  value="buscar" class="btn btn-default"/>
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
                                    <th>Seleccionar</th>
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
                                                                            <label for="obs">id material a solicitar :</label>
                                                                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $row['id_material']; ?>" name="id_material" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="cantidad">Cantidad</label>
                                                                            <input type="number" class="form-control" min="1" max="<?php echo $row['stock_material']; ?>" id="cant" name="cant" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="obs">Observacion</label>
                                                                            <input type="text" class="form-control" name="observacion" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="submit"  value="solicitar" class="btn btn-default"/>
                                                                        </div> 
                                                                    </div>   
                                                                </form>
                                                            </div>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
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




        </body>
    
</html>
