<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MaterialesController
 *
 * @author Vito
 */
class MaterialesController extends ControladorBase{
   public $conectar;
    public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        
        //Creamos el objeto usuario
        $material=new Material($this->adapter);
        
        //Conseguimos todos los usuarios
        $allmateriales=$material->getAll();

		//Producto
        
       
        //Cargamos la vista index y le pasamos valores
        $this->view("material",array(
            "allmateriales"=>$allmateriales
                
        ));
    }
    public function crear(){
        if(isset($_POST["nombreMaterial"])){
            
            $Material=new Material($this->adapter);
            $Material->setIdCategoria($_POST["idCategoria"]); 
            $Material->setNombreMaterial($_POST["nombreMaterial"]); 
            $Material->setEstadoMaterial($_POST["estadoMaterial"]);
            $Material->setStock($_POST["stock"]); 
            
            $save=$Material->save();
        }
        $this->redirect("Materiales", "index");
    }
    
    public function update(){
        if(isset($_POST["id"])){
            
            $id=$_POST["id"];
            $material=new Material($this->adapter);
            $material->setIdCategoria($_POST["idCategoria"]);
            $material->setNombreMaterial($_POST["nombreMaterial"]);
            $material->setEstadoMaterial($_POST["estadoMaterial"]);
            $material->setStock($_POST["stock"]);
            $save=$material->update($id);
        }
        $this->redirect("Materiales", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];
            
            
            $material=new Material($this->adapter);
            $material->deleteById($id); 
        }
        $this->redirect("Materiales", "index");
    }    
    
    public function actualizar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];            
            $material=new Material($this->adapter);
            $datos['material'] = $material->getByIdMaterial($id); 
            $this->view("material",$datos);
        }
        
    }
}
