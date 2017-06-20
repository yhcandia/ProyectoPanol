<?php
class EntidadBase{
    private $table;
    private $db;
    private $conectar;

    public function __construct($table, $adapter) {
        $this->table=(string) $table;
        
		/*
        require_once 'Conectar.php';
        $this->conectar=new Conectar();
        $this->db=$this->conectar->conexion();
		 */
		$this->conectar = null;
		$this->db = $adapter;
    }
    
    public function getConetar(){
        return $this->conectar;
    }
    
    public function db(){
        return $this->db;
    }
    
    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        if($resultSet=null){
            return null;
        }
        return $resultSet;
        
    }
    
    public function getById($id){
        $query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");

        if($row = $query->fetch_object()) {
           $resultSet=$row;
        }
        
        return $resultSet;
    }
    public function getByIdRol($id){
        $query=$this->db->query("SELECT * FROM $this->table WHERE id_rol=$id");

        if($row = $query->fetch_object()) {
           $resultSet=$row;
        }
        
        return $resultSet;
    }
    public function getByIdCat($id){
        $query=$this->db->query("SELECT * FROM $this->table WHERE id_categoria=$id");

        if($row = $query->fetch_object()) {
           $resultSet=$row;
        }
        
        return $resultSet;
    }
    public function getByRut($id){
        $query=$this->db->query("SELECT * FROM usuarios WHERE rut_usuario='$id'");

        if($row = $query->fetch_object()) {
           $resultSet=$row;
        }
        
        return $resultSet;
    }
    
    public function getBy($column,$value){
        $query=$this->db->query("SELECT * FROM $this->table WHERE $column='$value'");

        while($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    
    public function deleteById($id){
        $query=$this->db->query("DELETE FROM $this->table WHERE id='$id'"); 
        return $query;
    }
    public function deleteByIdCat($id){
        $query=$this->db->query("UPDATE $this->table SET estado_categoria='0' WHERE id_categoria='$id'"); 
        return $query;
    }
    public function deleteByIdRol($id){
        $query=$this->db->query("UPDATE $this->table SET estado_rol='0' WHERE id_rol='$id'"); 
        return $query;
    }
    
    public function deleteByRut($id){
        
        $query=$this->db->query("UPDATE $this->table SET estado_usuario='0' WHERE rut_usuario='$id'"); 
        return $query;
    }
    
    
    public function deleteBy($column,$value){
        $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'"); 
        return $query;
    }
    

    /*
     * Aqui podemos montarnos un monton de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */
    
}
?>
