<?php

/**
 * Description of PrestamosController
 *
 * @author Vito
 */
class PrestamosController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function index() {
        if (isset($_SESSION['session'])) {
            if ($_SESSION["session"]["idRol"] == "2" || $_SESSION["session"]["idRol"] == "3") {
                $this->misSolicitudes();
            } else {
                //Creamos el objeto usuario
                $usuario = new Usuario($this->adapter);

                //Conseguimos todos los usuarios
                $allusers = $usuario->getAllUsers();
                //$_SESSION["session"]["usersession"] =$allusers;
                $this->view("prestamo", array(
                    "allusers" => $allusers
                ));
            }
        }
    }

    public function prestamoProfesor() {
        if (isset($_REQUEST["id_material"])) {

            //Creamos un usuario
            $Prestamo = new Prestamo($this->adapter);
            $Prestamo->setRut_usuario(addslashes($_SESSION["session"]["rutUsuario"]));
            $Prestamo->setId_material(addslashes($_REQUEST["id_material"]));
            $Prestamo->setCantidad(addslashes($_REQUEST["cant"]));
            $Prestamo->setFecha_prestamo(date('Y-m-d'));
            $Prestamo->setObservacion(addslashes($_REQUEST["observacion"]));
            $Prestamo->setEstado_prestamo(3);

            $save = $Prestamo->save();
        }
        $this->redirect("Materiales", "index");
           
    }

    public function crear() {
        if (isset($_POST["rutUsuario"])) {

            //Creamos un usuario
            $Prestamo = new Prestamo($this->adapter);
            $Correo = new Correo($this->adapter);
            
            $Prestamo->setRut_usuario(addslashes($_POST["rutUsuario"]));
            $Prestamo->setId_material(addslashes($_POST["idMaterial"]));
            $Prestamo->setCantidad(addslashes($_POST["cantidad"]));
            $Prestamo->setFecha_prestamo(addslashes($_POST["fechaPrestamo"]));
            $Prestamo->setFecha_limite(addslashes($_POST["fechaDevolucion"]));
            $Prestamo->setObservacion(addslashes($_POST["observacion"]));
            $Prestamo->setEstado_prestamo(addslashes($_POST["estadoPrestamo"]));
            
            $material = new Material($this->adapter);
            $material = $material->getByIdMaterial(addslashes($_POST["idMaterial"]));   
            $nombreMaterial = $material->nombre_material;
            
            $usuario = new Usuario($this->adapter);
            $usuario = $usuario->getByRut(addslashes($_POST["rutUsuario"]));
            $correoUsuario = $usuario->mail_usuario;
            
            $Correo->setAsunto("Nuevo Prestamo");
+            $Correo->setParametro1($Prestamo->getRut_usuario());
+            $Correo->setParametro2($nombreMaterial);
+            $Correo->setParametro3($Prestamo->getCantidad());
+            $Correo->setParametro4($Prestamo->getFecha_prestamo());
+            $Correo->setParametro5($Prestamo->getFecha_limite());
+            $Correo->setParametro6($Prestamo->getObservacion());
+            $Correo->setParametro7($Prestamo->getEstado_prestamo());
+            $Correo->setPara($correoUsuario);
+            $Correo->envioCorreoPrestamo();
            
            $save = $Prestamo->save();
        }
        $this->redirect("Prestamos", "index");
    }

    public function crearProfesor() {
        if (isset($_POST["rutUsuario"])) {

            //Creamos un usuario
            $Prestamo = new Prestamo($this->adapter);
            $Prestamo->setRut_usuario(addslashes($_POST["rutUsuario"]));
            $Prestamo->setId_material(addslashes($_POST["idMaterial"]));
            $Prestamo->setCantidad(addslashes($_POST["cantidad"]));
            $Prestamo->setFecha_prestamo(addslashes($_POST["fechaPrestamo"]));
            $Prestamo->setObservacion(addslashes($_POST["observacion"]));

            $save = $Prestamo->saveProfesor();
        }
        $this->redirect("Prestamos", "index");
    }

    public function borrar() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];


            $prestamo = new Prestamo($this->adapter);
            $prestamo->darBaja($id);
        }
        $this->redirect("Prestamos", "index");
    }

    public function recibido() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];


            $prestamo = new Prestamo($this->adapter);
            $prestamo->recibido($id);
        }
        $this->redirect("Prestamos", "index");
    }

    public function porConfirmar() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];


            $prestamo = new Prestamo($this->adapter);
            $prestamo->porConfirmar($id);
        }
        $this->redirect("Prestamos", "index");
    }

    public function pendiente() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];


            $prestamo = new Prestamo($this->adapter);
            $prestamo->pendiente($id);
        }
        $this->redirect("Prestamos", "index");
    }

    public function update() {
        if (isset($_POST["idPrestamo"])) {

            //Creamos un usuario
            $id = $_POST["idPrestamo"];
            $prestamo = new Prestamo($this->adapter);
            $prestamo->setRut_usuario(addslashes($_POST["rutUsuario"]));
            $prestamo->setId_material(addslashes($_POST["idMaterial"]));
            $prestamo->setCantidad(addslashes($_POST["cantidad"]));
            $prestamo->setFecha_prestamo(addslashes($_POST["fechaPrestamo"]));
            $prestamo->setFecha_limite(addslashes($_POST["fechaDevolucion"]));
            $prestamo->setObservacion(addslashes($_POST["observacion"]));
            $prestamo->setEstado_prestamo(addslashes($_POST["estadoPrestamo"]));
            $save = $prestamo->update($id);
        }
        $this->redirect("Prestamos", "index");
    }

    public function actualizar() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $prestamos = new Prestamo($this->adapter);
            $datos['prestamo'] = $prestamos->getByIdPrest($id);
            //$datos['actualizar'] = $categoria->getId_categoria($id); 
            $this->view("prestamo", $datos);
        }
    }

    public function misSolicitudes() {

        $rut = '"' . $_SESSION["session"]["rutUsuario"] . '"';
        $query = "SELECT * FROM prestamo INNER JOIN material on prestamo.id_material=material.id_material WHERE rut_usuario = $rut ORDER BY id_prestamo ASC";
        $res = $this->adapter->query($query);

        $num_registros = mysqli_num_rows($res);
        $resul_x_pagina = 3;

        $paginacion = new Zebra_Pagination();
        $paginacion->records($num_registros);
        $paginacion->records_per_page($resul_x_pagina);

        $consulta = "SELECT * FROM prestamo INNER JOIN material on prestamo.id_material=material.id_material WHERE rut_usuario = $rut ORDER BY id_prestamo ASC LIMIT " . (($paginacion->get_page() - 1) * $resul_x_pagina) . ',' . $resul_x_pagina;
        $result = $this->adapter->query($consulta);
        $this->view("versolicitud", array(
            "paginacion" => $paginacion,
            "num_registros" => $num_registros,
            "result" => $result
        ));
    }

}
