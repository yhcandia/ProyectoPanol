<?php
/**
 * Description of Categoria
 *
 * @author Vito
 */
class Categoria extends EntidadBase{
    private $id_categoria;
    private $id_panol;
    private $nombreCategoria;
    private $desechable;
    
    public function __construct($adapter) {
        $table="categoria";
        parent::__construct($table, $adapter);
    }
    
    function getId_categoria() {
        return $this->id_categoria;
    }

    function getId_panol() {
        return $this->id_panol;
    }

    function getNombreCategoria() {
        return $this->nombreCategoria;
    }

    function getDesechable() {
        return $this->desechable;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    function setId_panol($id_panol) {
        $this->id_panol = $id_panol;
    }

    function setNombreCategoria($nombreCategoria) {
        $this->nombreCategoria = $nombreCategoria;
    }

    function setDesechable($desechable) {
        $this->desechable = $desechable;
    }
    
    public function save(){
        $query="INSERT INTO categoria (id_categoria,id_panol,nombre_categoria,desechable)
                VALUES('".NULL."',
                       '".$this->id_panol."',
                       '".$this->nombreCategoria."',
                       '".$this->desechable."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }


}
