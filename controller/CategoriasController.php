<?php
class CategoriasController extends ControladorBase{
    public $conectar;
    public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        
        //Creamos el objeto usuario
        $categoria=new Categoria($this->adapter);
        
        //Conseguimos todos los usuarios
        $allcategorias=$categoria->getAll();
        
        //Cargamos la vista index y le pasamos valores
        $this->view("categoria",array(
            "allcategorias"=>$allcategorias
                
        ));
    }
    public function crear(){
        if(isset($_POST["nombreCategoria"])){
            
            //Creamos un usuario
            $Categoria=new Categoria($this->adapter);
            $Categoria->setId_categoria(addslashes($_POST["idPanol"])); 
            $Categoria->setId_panol(addslashes($_POST["idPanol"])); 
            $Categoria->setNombreCategoria(addslashes($_POST["nombreCategoria"])); 
            $Categoria->setDesechable(addslashes($_POST["desechable"])); 
            $Categoria->setEstadoCategoria(addslashes($_POST["estadoCategoria"])); 
            $save=$Categoria->save();
        }
        $this->redirect("Categorias", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];
            
            
            $categoria=new Categoria($this->adapter);
            $categoria->deleteByIdCat($id); 
        }
        $this->redirect("Categorias", "index");
    }
    
    public function update(){
        if(isset($_POST["idCategoria"])){
            
            //Creamos un usuario
            $id=$_POST["idCategoria"];
            $categoria=new Categoria($this->adapter);
            $categoria->setNombreCategoria(addslashes($_POST["nombreCategoria"]));
            $categoria->setEstadoCategoria(addslashes($_POST["estadoCategoria"]));
            $categoria->setId_panol(addslashes($_POST["idPanol"]));
            $categoria->setDesechable(addslashes($_POST["desechable"]));
            $save=$categoria->update($id);
        }
        $this->redirect("Categorias", "index");
    }
    
    
    public function actualizar(){
        if(isset($_GET["id"])){ 
            $id=$_GET["id"];            
            $categoria=new Categoria($this->adapter);
            $datos['categoria'] = $categoria->getByIdCat($id); 
            //$datos['actualizar'] = $categoria->getId_categoria($id); 
            $this->view("categoria",$datos);
        }
        
    }

}
