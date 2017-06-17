<?php
/**
 * Description of CategoriasController
 *
 * @author Vito
 */
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
            $Categoria->setId_categoria($_POST["idPanol"]); 
            $Categoria->setId_panol($_POST["idPanol"]); 
            $Categoria->setNombreCategoria($_POST["nombreCategoria"]); 
            $Categoria->setDesechable($_POST["desechable"]); 
            $save=$Categoria->save();
        }
        $this->redirect("Categorias", "index");
    }

}
