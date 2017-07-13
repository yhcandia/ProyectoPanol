<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <title>.: INICIO :.</title>
        <style>        
            footer {
                padding-top:10px;
                width:100%;
                top: 200px;
                height:60px;
                position:relative;
                bottom:0;
                border-top: solid 5px #FAAF3A;
            }
            .container {
                left: 50%;
                max-width: 400px;
                top: 10%;   
            }
        </style>
    <body style="background-color:#012C56;" onload="actualiza()">
        
    </body>
    <div class="container" style="color: white;">
        <div style="width: 100%;text-align: center;position: relative;float: left; "><h1>Sistema Pañol Web.</h1></div>
        <div style="width: 100%;text-align: center;position: relative;float: left; "><img src="view/img/libroPanol.png" width="200px" height="30%"></div>
        <div style="width: 100%;text-align: center;position: relative; float: left;"><h1>
           <?php if($_SESSION["session"]["idRol"]==0){ ?>
               Administrador
           <?php }if($_SESSION["session"]["idRol"]==1){ ?>
               Pañolero
           <?php }if($_SESSION["session"]["idRol"]==2){ ?>
               Profesor
           <?php }if($_SESSION["session"]["idRol"]==3){ ?>
               Alumno
           <?php }if($_SESSION["session"]["idRol"]==4){ ?>
               Visita
           <?php }if($_SESSION["session"]["idRol"]==5){ ?>
               Director
           <?php } ?>
            </h1></div>
    </div>
    
    </div>
        <footer><center><img src="view/img/logo.png" alt="Duoc Uc"/><center></footer>
    </div>
</html>