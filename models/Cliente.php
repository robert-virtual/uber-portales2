<?php

class Cliente extends Model {
    public $id = "";
    public $estado = true;
    public $nombre = "";
    public $correo = "";
    public $direccion= "";
    public $telefono = "";
    public $fechaRegistro = "";
    

    public function __construct($estado = true,$nombre = "",$correo = "",$direccion = "",$telefono = "",
    $fechaRegistro = "",){
        parent::__construct();
        $this->conn = $this->db->connect();
        $this->estado = $estado;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->fechaRegistro = $fechaRegistro;

        
    }
   
 

    

    
}
?>