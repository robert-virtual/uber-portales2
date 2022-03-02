
<?php

class Conductor extends Model {
    public $id = "";
    public $nombre = "";
    public $correo = "";
    public $telefono = "";
    public $licenciaImagen = "";
    public $antecedentesImagen = "";
    public $fechaRegistro = "";
    public $Imagen= "";
    public $tipoCarro = "";
    public $estado = true;
    

    

    public function __construct($nombre = "",$correo = "",$telefono = "",$tipoCarro = "",$estado = true) {
        parent::__construct();
        $this->conn = $this->db->connect();
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->tipoCarro = $tipoCarro; 
    }
    public function create(){
        # code...
        $stmt = $this->conn->prepare("INSERT INTO conductores (nombre, correo, telefono, tipoCarro) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $this->nombre, $this->correo, $this->telefono,
        $this->tipoCarro);
        $stmt->execute();
        $stmt->close();
        $this->conn->close();
    }


    
    public function getAll(){
        
        $sql = "SELECT Id,Nombre,Correo,Telefono,TipoCarro FROM conductores where estado = 1";
        // print_r($this->conn);
        
        $result = $this->conn->query($sql);
        $conductores = [];
        if ($result->num_rows == 0) {
            // output data of each row
            $this->view->error = "Consulta vacia";
        }
        while($row = $result->fetch_assoc()) {
            $conductores[] = $row;
        }
        $this->conn->close();
        return $conductores;
    }
 
    
    

    
}
?>