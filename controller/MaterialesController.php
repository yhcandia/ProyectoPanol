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
            
            //Creamos un usuario
            $Material=new Material($this->adapter);
            $Material->setIdCategoria($_POST["idCategoria"]); 
            $Material->setIdMaterial($_POST["idCategoria"]); 
            $Material->setIdProveedor($_POST["idProveedor"]); 
            $Material->setNombreMaterial($_POST["nombreMaterial"]); 
            $Material->setImagen($_POST["nombreMaterial"]); 
            
            $save=$Material->save();
        }
        $this->redirect("Materiales", "index");
    }
}
