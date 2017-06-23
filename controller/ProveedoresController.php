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
        
        //Creamos el objeto usuario
        $proveedor=new Proveedor($this->adapter);
        
        //Conseguimos todos los usuarios
        $allproveedores=$proveedor->getAll();

		//Producto
        
       
        //Cargamos la vista index y le pasamos valores
        $this->view("proveedor",array(
            "allproveedores"=>$allproveedores
        ));
    }
    public function crear(){
        if(isset($_POST["nombreProveedor"])){
            
            $Proveedor=new Proveedor($this->adapter);
            $Proveedor->setRut_proveedor(addslashes($_POST["rutProveedor"])); 
            $Proveedor->setNombre_proveedor(addslashes($_POST["nombreProveedor"])); 
            $Proveedor->setEstado_proveedor(addslashes($_POST["estadoProveedor"])); 
            $Proveedor->setDireccion_Proveedor(addslashes($_POST["direccionProveedor"]));
            $save=$Proveedor->save();
        }
        $this->redirect("Proveedores", "index");
    }
    
       
    
    public function update(){
        if(isset($_POST["rut"])){
            
            //Creamos un prov
            $rut=$_POST["rut"];
            $proveedor=new Proveedor($this->adapter);
            $proveedor->setRut_proveedor(addslashes($_POST["rutProveedor"]));
            $proveedor->setNombre_proveedor(addslashes($_POST["nombreProveedor"]));
            $proveedor->setEstado_proveedor(addslashes($_POST["estadoProveedor"]));
            $proveedor->setDireccion_Proveedor(addslashes($_POST["direccionProveedor"]));
            $save=$proveedor->update($rut);
        }
        $this->redirect("Proveedores", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];
            
            
            $proveedor=new Proveedor($this->adapter);
            $proveedor->deleteProveedorByRut($id); 
        }
        $this->redirect("Proveedores", "index");
    }    
    
    public function actualizar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];            
            $proveedor=new Proveedor($this->adapter);
            $datos['proveedor'] = $proveedor->getByRutProveedor($id); 
            $this->view("proveedor",$datos);
        }
        
    }
}