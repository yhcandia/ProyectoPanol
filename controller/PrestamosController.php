<?php
/**
 * Description of PrestamosController
 *
 * @author Vito
 */
class PrestamosController extends ControladorBase{
    public $conectar;
    public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        
        //Creamos el objeto usuario
        $usuario=new Usuario($this->adapter);
        
        //Conseguimos todos los usuarios
        $allusers=$usuario->getAllUsers();
        //$_SESSION["session"]["usersession"] =$allusers;
        $this->view("prestamo",array(
            "allusers"=>$allusers
        ));
    }
    public function crear(){
        if(isset($_POST["rutUsuario"])){
            
            //Creamos un usuario
            $Prestamo=new Prestamo($this->adapter);
            $Prestamo->setRut_usuario($_POST["rutUsuario"]); 
            $Prestamo->setId_material($_POST["idMaterial"]); 
            $Prestamo->setCantidad($_POST["cantidad"]); 
            $Prestamo->setFecha_prestamo($_POST["fechaPrestamo"]); 
            $Prestamo->setFecha_limite($_POST["fechaDevolucion"]); 
            $Prestamo->setObservacion($_POST["observacion"]); 
            $Prestamo->setEstado_prestamo($_POST["estadoPrestamo"]); 
            
            $save=$Prestamo->save();
        }
        $this->redirect("Prestamos", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];
            
            
            $categoria=new Categoria($this->adapter);
            $categoria->deleteByIdCat($id); 
        }
        $this->redirect("Categorias", "index");
    }
    
    public function update(){
        if(isset($_POST["idPrestamo"])){
            
            //Creamos un usuario
            $id=$_POST["idPrestamo"];
            $prestamo=new Prestamo($this->adapter);
            $prestamo->setRut_usuario($_POST["rutUsuario"]);
            $prestamo->setId_material($_POST["idMaterial"]);
            $prestamo->setCantidad($_POST["cantidad"]);
            $prestamo->setFecha_prestamo($_POST["fechaPrestamo"]);
            $prestamo->setFecha_limite($_POST["fechaDevolucion"]);
            $prestamo->setObservacion($_POST["observacion"]);
            $prestamo->setEstado_prestamo($_POST["estadoPrestamo"]);
            $save=$prestamo->update($id);
        }
        $this->redirect("Prestamos", "index");
    }
    
    
    public function actualizar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];            
            $prestamos=new Prestamo($this->adapter);
            $datos['prestamo'] = $prestamos->getByIdPrest($id); 
            //$datos['actualizar'] = $categoria->getId_categoria($id); 
            $this->view("prestamo",$datos);
        }
        
    }

}
