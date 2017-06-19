
<?php
//Configuración global
require_once 'config/global.php';

//Base para los controladores
require_once 'core/ControladorBase.php';

//Funciones para el controlador frontal
require_once 'core/ControladorFrontal.func.php';
require("menu/menu.php"); 
//Cargamos controladores y acciones
if(isset($_GET["controller"])){
    
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}
?>
<html>
    <body bgcolor="#002c55">
        
    </body>
</html>