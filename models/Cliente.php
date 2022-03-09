<?php

class Cliente extends Model {
    public $id = "";
    public $estado = true;
    public $nombre = "";
    public $correo = "";
    public $direccion= "";
    public $telefono = "";
    public $fechaRegistro = "";
    



    public function __construct($nombre = "",$correo = "",$direccion = "",$telefono = "") {
        parent::__construct();
        $this->conn = $this->db->connect();
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    public function create(){
        $stmt = $this->conn->prepare("INSERT INTO clientes (nombre, correo, direccion, telefono) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $this->nombre, $this->correo, $this->direccion,$this->telefono,);
        $stmt->execute();
        $stmt->close();
        $this->conn->close();
    }
    
    public function getAll($estado = 1){
        
        $this->conn = $this->db->connect();
        $sql = "SELECT Id,Nombre,Correo,Direccion,Telefono FROM clientes where estado = $estado";
        
        $result = $this->conn->query($sql);
        $clientes = [];
        if ($result->num_rows == 0) {
            $this->view->error = "Consulta vacia";
        }
        while($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }
        $this->conn->close();
        return $clientes;
    }



    public function disable($id){
        $stmt = $this->conn->prepare("UPDATE clientes SET estado = !estado WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $this->conn->close();
    }
    
    public function update(){
        $sql = "UPDATE clientes SET nombre = IF(? != '',?, nombre), correo = IF(? != '', ?, correo), 
        direccion = IF(? != '', ?, direccion), 
        telefono = IF(? != '', ?,telefono) WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssssi",$this->nombre,$this->nombre,$this->correo,$this->correo,
        $this->direccion,$this->direccion, $this->telefono,$this->telefono,$this->id);
        $stmt->execute();
        $stmt->close();
        $this->conn->close();
    }
    


}

?>