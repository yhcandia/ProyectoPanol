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
        if(isset($_REQUEST["cambio"])){
           $this->view("cambioPwd",array(
            "nulo"=>""
        ));
        }else{
       
        //Cargamos la vista index y le pasamos valores
        $this->view("usuario",array(
            "allusers"=>$allusers
        ));
        }
    }
    public function login() {

        if (isset($_REQUEST["nnombre"]) && isset($_REQUEST["npassword"])) {
            $oUsu = new Usuario($this->adapter);
            $oUsu->setRutUsuario($_REQUEST["nnombre"]);
            $oUsu->setPassword(md5($_REQUEST["npassword"]));
            if($oUsu->VerificaExiste()){
                        if ($oUsu->VerificaUsuarioClave()) {
                            if($oUsu->getEstadoUsuario()==1 || $oUsu->getIdRol() ==3 || $oUsu->getIdRol() ==2){
                            //echo "Todo bien";
                            $_SESSION["session"]["nombreUsuario"] = $oUsu->getNombreUsuario();
                            $_SESSION["session"]["idRol"] = $oUsu->getIdRol();
                            $_SESSION["session"]["apellido"] = $oUsu->getApellidoUsuario();
                            $_SESSION["session"]["rutUsuario"] = $oUsu->getRutUsuario();
                            $_SESSION["session"]["emailUsuario"] = $oUsu->getEmailUsuario();
                            $_SESSION["session"]["estadoUsuario"] = $oUsu->getEstadoUsuario();

                            $this->redirect("index", "index");    
                            } else {
                            $this->view("login", array(
                                "mensaje" => "Su cuenta a sido desactivada, para activarla comuniquese con el pañolero",
                                "error" => "CUENTA DESACTIVADA"
                            ));
                            }

                        } else {
                            $this->view("login", array(
                                "error" => "La clave es incorrecta"
                            ));
                        }
            } else {
                            $this->view("login", array(
                                "error" => "El usuario no existe"
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
        public function cambiarPwd(){
        if(isset($_REQUEST["pwdactual"])){
           $oUsu = new Usuario($this->adapter);
           $oUsu->setRutUsuario($_SESSION["session"]["rutUsuario"]);
           $oUsu->setPassword(md5($_REQUEST["pwdactual"]));
           if ($oUsu->VerificaUsuarioClave()) {
               $oUsu->setPassword(md5($_REQUEST["pwd"]));
               $up= $oUsu->cambiarClave();
               $_SESSION['mensaje']="La password ha sido cambiada con exito";
           }  else {
               $_SESSION['mensaje']="La password actual es incorrecta";
           }
        }
           $this->view("cambioPwd",array(
            "nulo"=>""
        ));
        
        
    }
    public function crear(){
        if(isset($_POST["rutUsuario"])){
            
            //Creamos un usuario
            $usuario=new Usuario($this->adapter);
            $Correo = new Correo($this->adapter);
            $usuario->setRutUsuario(addslashes($_POST["rutUsuario"]));
            $usuario->setNombreUsuario(addslashes($_POST["nombreUsuario"]));
            $usuario->setApellidoUsuario(addslashes($_POST["apellidoUsuario"]));
            $usuario->setEstadoUsuario(addslashes($_POST["estadoUsuario"]));
            $usuario->setDireccionUsuario(addslashes($_POST["domicilioUsuario"]));
            $usuario->setEscuelaUsuario(addslashes($_POST["escuelaUsuario"]));
            $usuario->setTelefonoUsuario(addslashes($_POST["telefonoUsuario"]));
            $usuario->setEmailUsuario(addslashes($_POST["emailUsuario"]));
            $usuario->setIdRol(addslashes($_POST["idRol"]));
            $usuario->setPassword(md5($_POST["password"]));
            $Correo->setAsunto("Credenciales Usuario");
            $Correo->setParametro1($usuario->getRutUsuario());
            $Correo->setParametro2(addslashes($_POST["password"]));
            $Correo->setParametro3(addslashes($_POST["nombreUsuario"]));
            $Correo->setParametro4(addslashes($_POST["apellidoUsuario"]));
            $Correo->setPara($usuario->getEmailUsuario());
            $Correo->envioCorreoUsuario();
            $save=$usuario->save();
        }
        $this->redirect("Usuarios", "index");
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