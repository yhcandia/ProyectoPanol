<?php
/**
 * Description of Rol
 *
 * @author Vito
 */
class Rol extends EntidadBase{
    private $idRol;
    private $nombreRol;
    
    
    public function __construct($adapter) {
        $table="rol";
        parent::__construct($table, $adapter);
    }
    
    function getIdRol() {
        return $this->idRol;
    }

    function getNombreRol() {
        return $this->nombreRol;
    }

    function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    function setNombreRol($nombreRol) {
        $this->nombreRol = $nombreRol;
    }
    
    public function save(){
        $query="INSERT INTO rol (id_rol,nombre_rol)
                VALUES('".NULL."',
                       '".$this->nombreRol."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }


}
