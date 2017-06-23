<?php
/**
 * Description of RolesController
 *
 * @author Vito
 */
class RolesController extends ControladorBase{
     public $conectar;
    public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        
        //Creamos el objeto usuario
        $rol=new Rol($this->adapter);
        
        //Conseguimos todos los usuarios
        $allroles=$rol->getAll();

		//Producto
        
       
        //Cargamos la vista index y le pasamos valores
        $this->view("rol",array(
            "allroles"=>$allroles,
			
            "Hola"    =>"Soy Víctor Robles"
        ));
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];
            
            
            $rol=new Rol($this->adapter);
            $rol->deleteByIdRol($id); 
        }
        $this->redirect("Roles", "index");
    }
    
    public function crear(){
        if(isset($_POST["nombreRol"])){
            
            //Creamos un usuario
            $Rol=new Rol($this->adapter);
            $Rol->setNombreRol(addslashes($_POST["nombreRol"])); 
            $Rol->setEstadoRol(addslashes($_POST["estadoRol"])); 
            $save=$Rol->save();
        }
        $this->redirect("Roles", "index");
    }
    
    public function update(){
        if(isset($_POST["idRol"])){
            
            //Creamos un usuario
            $id=$_POST["idRol"];
            $rol=new Rol($this->adapter);
            $rol->setNombreRol(addslashes($_POST["nombreRol"]));
            $rol->setEstadoRol(addslashes($_POST["estadoRol"]));
            $save=$rol->update($id);
        }
        $this->redirect("Roles", "index");
    }
    
    
    public function actualizar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];            
            $rol=new Rol($this->adapter);
            $datos['rol'] = $rol->getByIdRol($id); 
            $datos['actualizar'] = $rol->getIdRol($id); 
            $this->view("rol",$datos);
        }
        
    }
}
