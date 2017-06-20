<?php
class Usuario extends EntidadBase{
    private $rutUsuario;
    private $nombreUsuario;
    private $estadoUsuario;
    private $emailUsuario;
    private $idRol;    
    private $password;
    
    public function __construct($adapter) {
        $table="usuarios";
        parent::__construct($table, $adapter);
    }
  
  
    function getRutUsuario() {
        return $this->rutUsuario;
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getEstadoUsuario() {
        return $this->estadoUsuario;
    }

    function getEmailUsuario() {
        return $this->emailUsuario;
    }

    function getIdRol() {
        return $this->idRol;
    }

    function getPassword() {
        return $this->password;
    }

    function setRutUsuario($rutUsuario) {
        $this->rutUsuario = $rutUsuario;
    }

    function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    function setEstadoUsuario($estadoUsuario) {
        $this->estadoUsuario = $estadoUsuario;
    }

    function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    
    public function update($rut){
        $query="UPDATE usuarios SET rut_usuario = '$this->rutUsuario',"
                . "id_rol = '$this->idRol',"
                . "nombre_usuario = '$this->nombreUsuario',"
                . "mail_usuario = '$this->emailUsuario',"
                . "estado_usuario = '$this->estadoUsuario',"
                . "password_usuario='$this->password' where rut_usuario= '$rut'";
        $update=$this->db()->query($query);
        $this->db()->error;
        return $update;
    }
    
    public function save(){
        $query="INSERT INTO usuarios (rut_usuario,id_rol,nombre_usuario,mail_usuario,estado_usuario,password_usuario)
                VALUES('".$this->rutUsuario."',
                       '".$this->idRol."',
                       '".$this->nombreUsuario."',
                       '".$this->emailUsuario."',
                       '".$this->estadoUsuario."',
                       '".$this->password."');";
        $save=$this->db()->query($query);
        $this->db()->error;
        return $save;
    }
    function VerificaUsuarioClave(){
        $sql="SELECT * FROM usuarios WHERE rut_usuario='$this->rutUsuario' and password_usuario='$this->password'";
              
        $resultado=  $this->db()->query($sql);
               
        if ($resultado->num_rows>=1){
            $row = $resultado->fetch_row();
            $this->rutUsuario = $row[0];
            $this->idRol = $row[1];
            $this->nombreUsuario=$row[2];
            $this->emailUsuario = $row[3];
            $this->estadoUsuario = $row[4];
            return true;
        }else{
            return false;
        }
    }
    

}
?>