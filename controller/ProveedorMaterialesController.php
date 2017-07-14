<?php

class ProveedorMaterialesController extends ControladorBase{
   public $conectar;
    public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        
        //Creamos el objeto usuario
        $proveedormaterial=new ProveedorMaterial($this->adapter);
        
        //Conseguimos todos los usuarios
        $allproveedormateriales=$proveedormaterial->getAll();

		//Producto
        
       
        //Cargamos la vista index y le pasamos valores
        $this->view("proveedormateriales",array(
            "allproveedormateriales"=>$allproveedormateriales
                
        ));
    }
    public function crear(){
        if(isset($_POST["id_material"])){
            
            $ProveedorMaterial=new ProveedorMaterial($this->adapter);
            $ProveedorMaterial->setId_material(addslashes($_POST["id_material"])); 
            $ProveedorMaterial->setId_proveedor(addslashes($_POST["id_proveedor"])); 
            $ProveedorMaterial->setCantidad_comprada(addslashes($_POST["cantidad_comprada"]));
            $ProveedorMaterial->setPrecio_unitario(addslashes($_POST["precio_unitario"])); 
            $ProveedorMaterial->setFecha_compra(addslashes($_POST["fecha_compra"])); 
            
            $save=$ProveedorMaterial->save();
        }
        $this->redirect("ProveedorMateriales", "index");
    }
    
    public function update(){
        if(isset($_POST["id"])){
            
            $id=$_POST["id"];
            $proveedorMaterial=new ProveedorMaterial($this->adapter);
            $proveedorMaterial->setId_material(addslashes($_POST["id_material"]));
            $proveedorMaterial->setId_proveedor(addslashes($_POST["id_proveedor"]));
            $proveedorMaterial->setCantidad_comprada(addslashes($_POST["cantidad_comprada"]));
            $proveedorMaterial->setPrecio_unitario(addslashes($_POST["precio_unitario"]));
            $proveedorMaterial->setFecha_compra(addslashes($_POST["fecha_compra"]));
            $save=$proveedorMaterial->update($id);
        }
        $this->redirect("ProveedorMateriales", "index");
    }
    
    public function actualizar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];            
            $proveedorMaterial=new ProveedorMaterial($this->adapter);
            $datos['proveedorMaterial'] = $proveedorMaterial->getByIdProveedorMaterial($id); 
            $this->view("proveedorMateriales",$datos);
        }
        
    }
}
