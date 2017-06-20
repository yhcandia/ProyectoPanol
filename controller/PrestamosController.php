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
        if(isset($_POST["idCategoria"])){
            
            //Creamos un usuario
            $id=$_POST["idCategoria"];
            $categoria=new Categoria($this->adapter);
            $categoria->setNombreCategoria($_POST["nombreCategoria"]);
            $categoria->setEstadoCategoria($_POST["estadoCategoria"]);
            $categoria->setId_panol($_POST["idPanol"]);
            $categoria->setDesechable($_POST["desechable"]);
            $save=$categoria->update($id);
        }
        $this->redirect("Categorias", "index");
    }
    
    
    public function actualizar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];            
            $categoria=new Categoria($this->adapter);
            $datos['categoria'] = $categoria->getByIdCat($id); 
            //$datos['actualizar'] = $categoria->getId_categoria($id); 
            $this->view("categoria",$datos);
        }
        
    }

}
