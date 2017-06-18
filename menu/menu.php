
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
            <a href="#" class="bt-menu"><span class="icon-home"></span>Menu</a>
        </div>
          <nav>
            <ul>
                <li><a href="./contenido.php"><span class="icon"></span>Inicio</a></li>
                <li><a href="./index.php?controller=usuarios"><span class="icon-user"></span>Usuario</a></li>
                <li><a href="./index.php?controller=categorias"><span class="icon-users"></span>Categorias</a></li>
                <li><a href="./index.php?controller=roles"><span class="icon-users"></span>Roles</a></li>
                <li><a href="./index.php?controller=materiales"><span class="icon-users"></span>Materiales</a></li>
                <li><a href="./index.php?controller=proveedores"><span class="icon-users"></span>Proveedores</a></li>
                <li><a href="./exit.php"><span class="icon-enter"></span>Salir</a></li>
            </ul>
        </nav>
    </header>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="menu/menu.js"></script>

</body>
</html>