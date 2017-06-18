<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proveedor
 *
 * @author Oscar
 */
class Proveedor extends EntidadBase{
    private $id_proveedor;
    private $id_material;
    private $rut_proveedor;
    private $nombre_proveedor;
    private $contacto;
    
    public function __construct($adapter) {
        $table="proveedor";
        parent::__construct($table, $adapter);
    }
    
    function getId_proveedor() {
        return $this->id_proveedor;
    }

    function getId_material() {
        return $this->id_material;
    }

    function getRut_proveedor() {
        return $this->rut_proveedor;
    }

    function getNombre_proveedor() {
        return $this->nombre_proveedor;
    }

    function getContacto() {
        return $this->contacto;
    }

    function setId_proveedor($id_proveedor) {
        $this->id_proveedor = $id_proveedor;
    }

    function setId_material($id_material) {
        $this->id_material = $id_material;
    }

    function setRut_proveedor($rut_proveedor) {
        $this->rut_proveedor = $rut_proveedor;
    }

    function setNombre_proveedor($nombre_proveedor) {
        $this->nombre_proveedor = $nombre_proveedor;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    public function save(){
        $query="INSERT INTO proveedor (id_proveedor,id_material,rut_proveedor,nombre_proveedor,contacto)
                VALUES('".$this->id_proveedor."',
                       '".$this->id_material."',
                       '".$this->rut_proveedor."',
                       '".$this->nombre_proveedor."',
                       '".$this->contacto."');";
        $save=$this->db()->query($query);
        $this->db()->error;
        return $save;
    }
    
}
