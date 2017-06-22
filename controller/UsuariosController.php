<?php
class UsuariosController extends ControladorBase{
    public $conectar;
    public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function getAdapter(){
     return $this->adapter;
    }


    public function index(){
        
        //Creamos el objeto usuario
        $usuario=new Usuario($this->adapter);
        
        //Conseguimos todos los usuarios
        $allusers=$usuario->getAll();

		//Producto
        
       
        //Cargamos la vista index y le pasamos valores
        $this->view("usuario",array(
            "allusers"=>$allusers
        ));
    }
     public function login() {

        if (isset($_REQUEST["nnombre"]) && isset($_REQUEST["npassword"])) {
            $oUsu = new Usuario($this->adapter);
            $oUsu->setRutUsuario($_REQUEST["nnombre"]);
            $oUsu->setPassword(md5($_REQUEST["npassword"]));
            if ($oUsu->VerificaUsuarioClave()) {
                //echo "Todo bien";
                $_SESSION["session"]["nombreUsuario"] = $oUsu->getNombreUsuario();
                $_SESSION["session"]["idRol"] = $oUsu->getIdRol();
                $_SESSION["session"]["apellido"] = $oUsu->getApellidoUsuario();
                $_SESSION["session"]["rutUsuario"] = $oUsu->getRutUsuario();
                $_SESSION["session"]["emailUsuario"] = $oUsu->getEmailUsuario();
                $_SESSION["session"]["estadoUsuario"] = $oUsu->getEstadoUsuario();
                if ($_SESSION["session"]["idRol"] == '0'){
                $this->redirect("index", "index");    
                }
                if ($_SESSION["session"]["idRol"] == '1'){
                $this->redirect("index", "index");    
                }
               
            } else {
                $this->view("login", array(
                    "error" => "El usuario o la clave es incorrecta"
                ));
            }
        }else {
               $this->view("login", array(
                    "error" => ""
                ));
            }
    }
    public function logout(){
        session_destroy();
        $this->redirect("Usuarios", "index");
        
    }
    public function crear(){
        if(isset($_POST["rutUsuario"])){
            
            //Creamos un usuario
            $usuario=new Usuario($this->adapter);
            $usuario->setRutUsuario($_POST["rutUsuario"]);
            $usuario->setNombreUsuario($_POST["nombreUsuario"]);
            $usuario->setApellidoUsuario($_POST["apellidoUsuario"]);
            $usuario->setEstadoUsuario($_POST["estadoUsuario"]);
            $usuario->setDireccionUsuario($_POST["domicilioUsuario"]);
            $usuario->setEscuelaUsuario($_POST["escuelaUsuario"]);
            $usuario->setTelefonoUsuario($_POST["telefonoUsuario"]);
            $usuario->setEmailUsuario($_POST["emailUsuario"]);
            $usuario->setIdRol($_POST["idRol"]);
            $usuario->setPassword(md5($_POST["password"]));
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
            $usuario->setApellidoUsuario($_POST["apellidoUsuario"]);
            $usuario->setEstadoUsuario($_POST["estadoUsuario"]);
            $usuario->setDireccionUsuario($_POST["domicilioUsuario"]);
            $usuario->setTelefonoUsuario($_POST["telefonoUsuario"]);
            $usuario->setEscuelaUsuario($_POST["escuelaUsuario"]);
            $usuario->setEmailUsuario($_POST["emailUsuario"]);
            $usuario->setIdRol($_POST["idRol"]);
            $usuario->setPassword(md5($_POST["password"]));
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
//            $datos['actualizar'] = $usuario->getByRut($id); 
            $this->view("usuario",$datos);
        }
        
    }
    
    
    
    
    

}
?>