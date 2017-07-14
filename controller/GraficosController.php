<?php

class GraficosController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function getAdapter() {
        return $this->adapter;
    }

    public function index() { 

        $num_registros1 = null;
        $num_registros2= null;
        $num_registros3= null;
        $num_registros4= null;
        $resultGrafico2= null;
        $resultGrafico3= null;
        $resultGrafico4= null;
        $num_reg1= null;
        $num_reg2= null;
        $num_reg3= null;
        $num_reg4= null;
        $num_reg5= null;
        $resultGrafico6= null;
        $resultGrafico7= null;
        
        //grafico 1
        $queryEstadoDesactivado="SELECT * FROM prestamo where estado_prestamo=0";
        $res1 = $this->adapter->query($queryEstadoDesactivado);
        $num_registros1 = mysqli_num_rows($res1);
        
        $queryEstadoFinalizado="SELECT * FROM prestamo where estado_prestamo=1";
        $res2 = $this->adapter->query($queryEstadoFinalizado);
        $num_registros2 = mysqli_num_rows($res2);
        
        $queryEstadoPendiente="SELECT * FROM prestamo where estado_prestamo=2";
        $res3 = $this->adapter->query($queryEstadoPendiente);
        $num_registros3 = mysqli_num_rows($res3);
        
        $queryEstadoPorConfirmar="SELECT * FROM prestamo where estado_prestamo=3";
        $res4 = $this->adapter->query($queryEstadoPorConfirmar);
        $num_registros4 = mysqli_num_rows($res4);
        
         //grafico 2
        $queryMesPrestamo="SELECT MONTH(prestamo.fecha_prestamo) as mes,count(*) as cantidad from prestamo GROUP BY MONTH(prestamo.fecha_prestamo);";
        $res5 = $this->adapter->query($queryMesPrestamo);
        while ($row = $res5->fetch_object()) {
            $resultGrafico2[] = $row;
        }
        
        //grafico 3
        $queryPrestamosUsuario="SELECT prestamo.rut_usuario as rut_usuario, usuarios.nombre_usuario as nombre, COUNT(prestamo.rut_usuario) as cantidad FROM prestamo INNER JOIN usuarios ON prestamo.rut_usuario = usuarios.rut_usuario GROUP BY prestamo.rut_usuario;";
        $res6 = $this->adapter->query($queryPrestamosUsuario);
        while ($row = $res6->fetch_object()) {
            $resultGrafico3[] = $row;
        }
        
        //grafico 4
        $queryMaterialCategoria="SELECT material.id_categoria as id_categoria, categoria.nombre_categoria as nombre, COUNT(material.id_categoria) as cantidad FROM material INNER JOIN categoria ON material.id_categoria = categoria.id_categoria GROUP BY material.id_categoria;";
        $res7 = $this->adapter->query($queryMaterialCategoria);
        while ($row = $res7->fetch_object()) {
            $resultGrafico4[] = $row;
        }
        
        //grafico 5
        $queryMaterialPrestamo="SELECT prestamo.id_material as id_material, material.nombre_material as nombre, COUNT(prestamo.id_material) as cantidad FROM prestamo INNER JOIN material ON prestamo.id_material = material.id_material GROUP BY prestamo.id_material;";
        $res8 = $this->adapter->query($queryMaterialPrestamo);
        while ($row = $res8->fetch_object()) {
            $resultGrafico5[] = $row;
        }
        
        //grafico 6
        $queryMaterialDinero="SELECT MONTH(proveedor_material.fecha_compra) as mes,count(*) as cantidad, (cantidad_comprada*precio_unitario) as plata from proveedor_material GROUP BY MONTH(proveedor_material.fecha_compra);";
        $res9 = $this->adapter->query($queryMaterialDinero);
        while ($row = $res9->fetch_object()) {
            $resultGrafico6[] = $row;
        }
        
       
        
        $this->view("grafico", array(
                "numDesactivado" => $num_registros1,
                "numFinalizado" => $num_registros2, 
                "numPendiente" => $num_registros3, 
                "numPorConfirmar" => $num_registros4,
                "grafico2" => $resultGrafico2,
                "grafico3" => $resultGrafico3,
                "grafico4" => $resultGrafico4,
                "grafico5" => $resultGrafico5,
                "grafico6" => $resultGrafico6
        ));      
    }

 
}

?>
