<?php
class UsuariosPanolController extends ControladorBase{
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
        $this->view("usuarioPanol",array(
            "allusers"=>$allusers
        ));
    }
     public function login() {

        if (isset($_REQUEST["nnombre"]) && isset($_REQUEST["npassword"])) {
            $oUsu = new Usuario($this->adapter);
            $oUsu->setRutUsuario($_REQUEST["nnombre"]);
            $oUsu->setPassword($_REQUEST["npassword"]);
            if ($oUsu->VerificaUsuarioClave()) {
                //echo "Todo bien";
                $_SESSION["session"]["nombreUsuario"] = $oUsu->getNombreUsuario();
                $_SESSION["session"]["apellido"] = $oUsu->getApellidoUsuario();
                $_SESSION["session"]["idRol"] = $oUsu->getIdRol();
                $_SESSION["session"]["rutUsuario"] = $oUsu->getRutUsuario();
                $_SESSION["session"]["emailUsuario"] = $oUsu->getEmailUsuario();
                $_SESSION["session"]["estadoUsuario"] = $oUsu->getEstadoUsuario();
                $this->redirect("Usuarios", "index");
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
            $usuario->setRutUsuario(addslashes($_POST["rutUsuario"]));
            $usuario->setNombreUsuario(addslashes(["nombreUsuario"]));
            $usuario->setApellidoUsuario(addslashes($_POST["apellidoUsuario"]));
            $usuario->setEstadoUsuario(addslashes($_POST["estadoUsuario"]));
            $usuario->setDireccionUsuario(addslashes($_POST["domicilioUsuario"]));
            $usuario->setEscuelaUsuario(addslashes($_POST["escuelaUsuario"]));
            $usuario->setTelefonoUsuario(addslashes($_POST["telefonoUsuario"]));
            $usuario->setEmailUsuario(addslashes($_POST["emailUsuario"]));
            $usuario->setIdRol(addslashes($_POST["idRol"]));
            $usuario->setPassword(md5($_POST["password"]));
            $save=$usuario->save();
        }
        $this->redirect("UsuariosPanol", "index");
    }
    
    public function update(){
        if(isset($_POST["rutUsuario"])){
            
            //Creamos un usuario
            $rut=$_POST["rut"];
            $usuario=new Usuario($this->adapter);
            $usuario->setRutUsuario(addslashes($_POST["rutUsuario"]));
            $usuario->setNombreUsuario(addslashes($_POST["nombreUsuario"]));
            $usuario->setApellidoUsuario(addslashes($_POST["apellidoUsuario"]));
            $usuario->setEstadoUsuario(addslashes($_POST["estadoUsuario"]));
            $usuario->setDireccionUsuario(addslashes($_POST["domicilioUsuario"]));
            $usuario->setTelefonoUsuario(addslashes($_POST["telefonoUsuario"]));
            $usuario->setEscuelaUsuario(addslashes($_POST["escuelaUsuario"]));
            $usuario->setEmailUsuario(addslashes($_POST["emailUsuario"]));
            $usuario->setIdRol(addslashes($_POST["idRol"]));
            if(($_POST["password"]) != "")
            {
                $usuario->setPassword(md5($_POST["password"]));
                $save=$usuario->updateConPw($rut);
            } else {
                $save=$usuario->updateSinPw($rut);
            }
            $save=$usuario->update($rut);
        }
        $this->redirect("UsuariosPanol", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];
            
            
            $usuario=new Usuario($this->adapter);
            $usuario->deleteByRut($id); 
        }
        $this->redirect("UsuariosPanol", "index");
    }
    public function actualizar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];            
            $usuario=new Usuario($this->adapter);
            $datos['usuario'] = $usuario->getByRut($id); 
//            $datos['actualizar'] = $usuario->getByRut($id); 
            $this->view("usuarioPanol",$datos);
        }
        
    }
    
    
    
    
    

}
?>