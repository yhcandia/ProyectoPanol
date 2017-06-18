<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProveedoresController
 *
 * @author Oscar
 */
class ProveedoresController extends ControladorBase{
    public $conectar;
    public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        
        //Creamos el objeto proveedor
        $proveedor=new Proveedor($this->adapter);
        
        //Conseguimos todos los proveedores
        $allProveedores=$proveedor->getAll();
        
        //Cargamos la vista index y le pasamos valores
        $this->view("proveedor",array(
            "allProveedores"=>$allProveedores
                
        ));
    }
    public function crear(){
        if(isset($_POST["nombreProveedor"])){
            
            //Creamos un usuario
            $Proveedor=new Proveedor($this->adapter);
            $Proveedor->setId_proveedor($_POST["idProveedor"]); 
            $Proveedor->setId_material($_POST["idMaterial"]); 
            $Proveedor->setRut_proveedor($_POST["rutProveedor"]); 
            $Proveedor->setNombre_proveedor($_POST["nombreProveedor"]); 
            $Proveedor->setContacto($_POST["contacto"]); 
            $save=$Proveedor->save();
        }
        $this->redirect("Proveedores", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            
            $proveedor=new Proveedor($this->adapter);
            $proveedor->deleteBy("id_proveedor",$id); 
        }
        $this->redirect("Proveedores", "index");
    }
}