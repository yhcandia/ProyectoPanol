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
        <form action="<?php echo $helper->url("categorias","crear"); ?>" method="post" class="col-lg-5">
            <h3>Añadir categoria</h3>
            <hr/>
            Id Pañol: <input type="number" name="idPanol" class="form-control"/>
            Nombre categoria: <input type="text" name="nombreCategoria" class="form-control"/>
            Desechable: <select name="desechable">
                <option value="0"> Desechable </option>
                <option value="1"> Retornable </option>
            </select>
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
        
        
        
        
    </body>
</html>