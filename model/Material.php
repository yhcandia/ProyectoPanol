<?php
/**
 * Description of Material
 *
 * @author Vito
 */
class Material extends EntidadBase{
    private $idMaterial;
    private $idCategoria;
    private $idProveedor;
    private $nombreMaterial;
    private $imagen;
    
    public function __construct($adapter) {
        $table="material";
        parent::__construct($table, $adapter);
    }
    
    function getIdMaterial() {
        return $this->idMaterial;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getIdProveedor() {
        return $this->idProveedor;
    }

    function getNombreMaterial() {
        return $this->nombreMaterial;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setIdMaterial($idMaterial) {
        $this->idMaterial = $idMaterial;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setIdProveedor($idProveedor) {
        $this->idProveedor = $idProveedor;
    }

    function setNombreMaterial($nombreMaterial) {
        $this->nombreMaterial = $nombreMaterial;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function save(){
        $query="INSERT INTO material (id_material,id_categoria,id_proveedor,nombre_material,imagen)
                VALUES('".NULL."',
                       '".$this->idCategoria."',
                       '".$this->idProveedor."',
                       '".$this->nombreMaterial."',
                       '".$this->nombreMaterial."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    
}
