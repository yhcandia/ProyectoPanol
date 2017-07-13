<?php
/**
 * Description of Material
 *
 * @author Vito
 */
class Material extends EntidadBase{
    private $idMaterial;
    private $idCategoria;
    private $nombreMaterial;
    private $estadoMaterial;
    private $stock;
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

    function getNombreMaterial() {
        return $this->nombreMaterial;
    }

    function getEstadoMaterial() {
        return $this->estadoMaterial;
    }

    function getStock() {
        return $this->stock;
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

    function setNombreMaterial($nombreMaterial) {
        $this->nombreMaterial = $nombreMaterial;
    }

    function setEstadoMaterial($estadoMaterial) {
        $this->estadoMaterial = $estadoMaterial;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }
    
    public function update($id){
        $query="UPDATE material SET id_categoria= '$this->idCategoria',"
                . "nombre_material = '$this->nombreMaterial',"
                . "estado_material = '$this->estadoMaterial',"
                . "stock_material = '$this->stock',"
                . "imagen ='$this->imagen' where id_material= '$id'";
        $update=$this->db()->query($query);
        $this->db()->error;
        return $update;
    }
    
    public function updateSinFoto($id){
        $query="UPDATE material SET id_categoria= '$this->idCategoria',"
                . "nombre_material = '$this->nombreMaterial',"
                . "estado_material = '$this->estadoMaterial',"
                . "stock_material = '$this->stock' where id_material= '$id'";
        $update=$this->db()->query($query);
        $this->db()->error;
        return $update;
    }
    public function saveConCodigo($arreglo){
        $query="INSERT INTO material (id_categoria,nombre_material,estado_material,stock_material,imagen)
                VALUES('".$this->idCategoria."',
                       '".$this->nombreMaterial."',
                       '".$this->estadoMaterial."',
                       '".$this->stock."',
                       '".$this->imagen."');";
        $save=$this->db()->query($query);
        $query="SELECT MAX(id_material) AS id FROM material";
        $rs=$this->db()->query($query);
        if ($row = mysqli_fetch_row($rs)) {
        $id = trim($row[0]);
        }
         if($this->stock>0){
                for($i=0;$i<$this->stock;$i++){
                    $query="INSERT INTO detalle_material (id_material,codigo,estado)
                        VALUES('".$id."',
                        '".$arreglo[$i]."',    
                       '1');";
                    $save=$this->db()->query($query);
                }
            }
        $this->db()->error;
        return $save;
    }
    public function save(){
        $query="INSERT INTO material (id_categoria,nombre_material,estado_material,stock_material,imagen)
                VALUES('".$this->idCategoria."',
                       '".$this->nombreMaterial."',
                       '".$this->estadoMaterial."',
                       '".$this->stock."',
                       '".$this->imagen."');";
        $save=$this->db()->query($query);
        $this->db()->error;
        return $save;
    }

    
}
