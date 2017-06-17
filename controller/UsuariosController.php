<?php
class UsuariosController extends ControladorBase{
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
        $allusers=$usuario->getAll();

		//Producto
        
       
        //Cargamos la vista index y le pasamos valores
        $this->view("usuario",array(
            "allusers"=>$allusers,
			
            "Hola"    =>"Soy Víctor Robles"
        ));
    }
    
    public function crear(){
        if(isset($_POST["rutUsuario"])){
            
            //Creamos un usuario
            $usuario=new Usuario($this->adapter);
            $usuario->setRutUsuario($_POST["rutUsuario"]);
            $usuario->setNombreUsuario($_POST["nombreUsuario"]);
            $usuario->setEstadoUsuario($_POST["estadoUsuario"]);
            $usuario->setEmailUsuario($_POST["emailUsuario"]);
            $usuario->setIdRol($_POST["idRol"]);
            $usuario->setPassword(sha1($_POST["password"]));
            $save=$usuario->save();
        }
        $this->redirect("Usuarios", "index");
    }
    
    public function update(){
        if(isset($_POST["rutUsuario"])){
            
            //Creamos un usuario
            $rut=$_POST["rut"];
            $usuario=new Usuario($this->adapter);
            $usuario->setRutUsuario($_POST["rutUsuario"]);
            $usuario->setNombreUsuario($_POST["nombreUsuario"]);
            $usuario->setEstadoUsuario($_POST["estadoUsuario"]);
            $usuario->setEmailUsuario($_POST["emailUsuario"]);
            $usuario->setIdRol($_POST["idRol"]);
            $usuario->setPassword(sha1($_POST["password"]));
            $save=$usuario->update($rut);
        }
        $this->redirect("Usuarios", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];
            
            
            $usuario=new Usuario($this->adapter);
            $usuario->deleteByRut($id); 
        }
        $this->redirect("Usuarios", "index");
    }
    public function actualizar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];            
            $usuario=new Usuario($this->adapter);
            $datos['usuario'] = $usuario->getByRut($id); 
            $this->view("actualizarUsuario",$datos);
        }
        
    }
    
    
    
    
    

}
?>