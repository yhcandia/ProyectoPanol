<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo $helper->url("proveedores","crear"); ?>" method="post" class="col-lg-5">
            <h3>Añadir Proveedor</h3>
            <hr/>
            RUT Proveedor: <input type="text" name="rutProveedor" class="form-control"/>
            Nombre Proveedor: <input type="text" name="nombreProveedor" class="form-control"/>
            Direccion Proveedor: <input type="text" name="direccionProveedor" class="form-control"/>
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
        
        <div class="col-lg-7">
            <h3>Proveedores</h3>
            <hr/>
        </div>
        <section class="col-lg-7 usuario" style="height:400px;overflow-y:scroll;">
            <?php  
            foreach($allproveedores as $proveedor) {?>
                <?php echo $proveedor->id_proveedor; ?> -
                <?php echo $proveedor->rut_proveedor; ?> -
                <?php echo $proveedor->nombre_proveedor; ?> -   
                <?php echo $proveedor->estado_proveedor; ?> -   
                <?php echo $proveedor->direccion_proveedor; ?>    
                <div class="right">
                    <a href="<?php echo $helper->url("Proveedores","borrar"); ?>&id=<?php echo $proveedor->id_proveedor; ?>" class="btn btn-danger">Borrar</a>
                </div>
                <hr/>
            <?php }
             ?>
        </section>
        
        
    </body>
</html>