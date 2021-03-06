
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Sistema Pañol</title>
        <link rel="stylesheet" href="menu/stilo.css">
        <link rel="stylesheet" href="menu/font.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    </head>
    <body>
        <header>
            <div class="menu_bar">
                <a href="#" class="bt-menu"><span class="icon-home"></span> Menu <div  style="position: absolute;background:#00162B; right: 5px; top: 10px; height: 60px; width: 25%;text-align: center; font-size: 70%">Bienvenid@ <?php echo $_SESSION['session']['nombreUsuario']." ".$_SESSION['session']['apellido']; ?></div></a>         
            </div>
            <nav>
                <ul>
                    <?php
                    if (isset($_SESSION['session'])) {
                        if ($_SESSION['session']['idRol'] == '0') {
                            ?>    
                            <li><a href="./index.php?controller=index"><span class="glyphicon glyphicon-home"></span>Inicio</a></li> 
                            <li><a href="./index.php?controller=prestamos"><span class="glyphicon glyphicon-transfer"></span>Prestamo</a></li>
                            <li><a href="./index.php?controller=usuarios"><span class="glyphicon glyphicon-user"></span>Usuarios</a></li>
                            <li><a href="./index.php?controller=categorias"><span class="glyphicon glyphicon-book"></span>Categorias</a></li>
                            <li><a href="./index.php?controller=roles"><span class="icon-users"></span>Roles</a></li>
                            <li><a href="./index.php?controller=materiales"><span class="glyphicon glyphicon-folder-close"></span>Materiales</a></li>
                            <li><a href="./index.php?controller=proveedores"><span class="glyphicon glyphicon-briefcase"></span>Proveedores</a></li>
                            <li><a href="./index.php?controller=proveedormateriales"><span class="glyphicon glyphicon-shopping-cart"></span>Compras</a></li>
                             <li><a href="./index.php?controller=usuarios&cambio=1"><span class="glyphicon glyphicon-book"></span>Cambio de clave</a></li>
                             <li><a href="./index.php?controller=graficos&action=index"><span class="glyphicon glyphicon-stats"></span>Graficos</a></li>
                           
                            <?php
                        }
                        if ($_SESSION['session']['idRol'] == '1') {
                            ?>    
                            <li><a href="./index.php?controller=index"><span class="glyphicon glyphicon-home"></span>Inicio</a></li> 
                            <li><a href="./index.php?controller=prestamos"><span class="glyphicon glyphicon-transfer"></span>Prestamo</a></li>
                            <li><a href="./index.php?controller=usuariosPanol"><span class="icon-users"></span>Usuarios</a></li>
                            <li><a href="./index.php?controller=materiales"><span class="glyphicon glyphicon-folder-close"></span>Materiales</a></li>
                            <li><a href="./index.php?controller=proveedormateriales"><span class="glyphicon glyphicon-shopping-cart"></span>Compras</a></li>
                            <li><a href="./index.php?controller=usuarios&cambio=1"><span class="glyphicon glyphicon-book"></span>Cambio de clave</a></li>
                             <li><a href="./index.php?controller=graficos&action=index"><span class="glyphicon glyphicon-stats"></span>Graficos</a></li>
                           
                            <?php
                        }
                        if ($_SESSION['session']['idRol'] == '2') {
                            ?>    
                            <li><a href="./index.php?controller=index"><span class="glyphicon glyphicon-home"></span>Inicio</a></li> 
                            <?php if ($_SESSION['session']['estadoUsuario'] == '1') {  ?>
                            <li><a href="./index.php?controller=materiales"><span class="glyphicon glyphicon-transfer"></span>Solicitar Prestamo</a></li>
                            <?php } ?>
                            <li><a href="./index.php?controller=prestamos"><span class="glyphicon glyphicon-transfer"></span>Ver Prestamo</a></li>
                            <li><a href="./index.php?controller=usuarios&cambio=1"><span class="glyphicon glyphicon-book"></span>Cambio de clave</a></li>
                            
                            <?php
                        }
                        if ($_SESSION['session']['idRol'] == '3') {
                            ?>  
                            <li><a href="./index.php?controller=index"><span class="glyphicon glyphicon-home"></span>Inicio</a></li> 
                            <li><a href="./index.php?controller=prestamos"><span class="glyphicon glyphicon-transfer"></span>Ver Prestamo</a></li>                        
                            <li><a href="./index.php?controller=usuarios&cambio=1"><span class="glyphicon glyphicon-book"></span>Cambio de clave</a></li>
                           
                            <?php
                        }
                        if ($_SESSION['session']['idRol'] == '4') {
                            ?>  
                            <li><a href="./index.php?controller=index"><span class="glyphicon glyphicon-home"></span>Inicio</a></li> 
                            <li><a href="./index.php?controller=prestamos"><span class="glyphicon glyphicon-transfer"></span>Ver Prestamo</a></li>                        
                            <li><a href="./index.php?controller=usuarios&cambio=1"><span class="glyphicon glyphicon-book"></span>Cambio de clave</a></li>
                           
                            <?php
                        }
                        if ($_SESSION['session']['idRol'] == '5') {
                            ?>    
                            <li><a href="./index.php?controller=index"><span class="glyphicon glyphicon-home"></span>Inicio</a></li> 
                            <li><a href="./index.php?controller=verReportes"><span class="glyphicon glyphicon-transfer"></span>Ver Reportes</a></li>
                            <li><a href="./index.php?controller=usuarios&cambio=1"><span class="glyphicon glyphicon-book"></span>Cambio de clave</a></li>
                             <li><a href="./index.php?controller=graficos&action=index"><span class="glyphicon glyphicon-stats"></span>Graficos</a></li>
                            <?php
                        }
                    }
                    ?>
                    <li><a href="./index.php?controller=usuarios&action=logout"><span class="icon-enter"></span>Salir</a></li>

                </ul>
            </nav>
        </header>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="menu/menu.js"></script>

    </body>
</html>
