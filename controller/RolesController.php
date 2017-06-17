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
    
    public function crear(){
        if(isset($_POST["nombreRol"])){
            
            //Creamos un usuario
            $Rol=new Rol($this->adapter);
            $Rol->setNombreRol($_POST["nombreRol"]); 
            $Rol->setIdRol($_POST["nombreRol"]); 
            $save=$Rol->save();
        }
        $this->redirect("Roles", "index");
    }
}
