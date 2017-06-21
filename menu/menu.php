
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Menu</title>
        <link rel="stylesheet" href="menu/stilo.css">
        <link rel="stylesheet" href="menu/font.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    </head>
    <body>
        <header>
            <div class="menu_bar">
                <a href="#" class="bt-menu"><span class="icon-home"></span> Menu</a>         
            </div>
            <nav>
                <ul>
                    <?php
                   if (isset($_SESSION['session'])) {
                        if($_SESSION['session']['idRol'] == '0'){                   
                            ?>    
                            <li><a href="./contenido.php"><span class="icon"></span>Inicio</a></li>                      
                            <li><a href="./index.php?controller=usuarios"><span class="icon-users"></span>Usuarios</a></li>
                            <li><a href="./index.php?controller=categorias"><span class="glyphicon glyphicon-book"></span>Categorias</a></li>
                            <li><a href="./index.php?controller=roles"><span class="icon-users"></span>Roles</a></li>
                            <li><a href="./index.php?controller=materiales"><span class="glyphicon glyphicon-folder-close"></span>Materiales</a></li>
                            <li><a href="./index.php?controller=proveedores"><span class="icon-users"></span>Proveedores</a></li>
                            <?php
                        }
                        if($_SESSION['session']['idRol'] == '1'){                   
                            ?>    
                            <li><a href="./contenido.php"><span class="icon"></span>Inicio</a></li>
                            <li><a href="./index.php?controller=prestamos"><span class="glyphicon glyphicon-transfer"></span>Prestamo</a></li>
                            <li><a href="./index.php?controller=usuariosPanol"><span class="icon-users"></span>Usuarios</a></li>
                            <li><a href="./index.php?controller=materiales"><span class="glyphicon glyphicon-folder-close"></span>Materiales</a></li>
                                                  
                            
                            <?php
                        } 
                        if($_SESSION['session']['idRol'] == '2'){                   
                            ?>    
                            <li><a href="./contenido.php"><span class="icon"></span>Inicio</a></li>
                            <li><a href="./index.php?controller=prestamos"><span class="glyphicon glyphicon-transfer"></span>Solicitar Prestamo</a></li>
                            <li><a href="./index.php?controller=verPrestamos"><span class="glyphicon glyphicon-transfer"></span>Ver Prestamo</a></li>
                            <?php
                        } 
                        if($_SESSION['session']['idRol'] == '3' || $_SESSION['session']['idRol'] == '4'){                   
                            ?>  
                            <li><a href="./contenido.php"><span class="icon"></span>Inicio</a></li>
                            <li><a href="./index.php?controller=verPrestamos"><span class="glyphicon glyphicon-transfer"></span>Ver Prestamo</a></li>                        
                            <?php
                        } 
                         if($_SESSION['session']['idRol'] == '5'){                   
                            ?>    
                            <li><a href="./contenido.php"><span class="icon"></span>Inicio</a></li>
                            <li><a href="./index.php?controller=verReportes"><span class="glyphicon glyphicon-transfer"></span>Ver Reportes</a></li>
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
