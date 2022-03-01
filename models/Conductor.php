
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
    

    public function __construct($nombre = "",$correo = "",$telefono = "",$licenciaImagen = "",$antecedentesImagen = "",
    $fechaRegistro = "", $Imagen= "",$tipoCarro = "",$estado = true) {
        parent::__construct();
        $this->conn = $this->db->connect();
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->licenciaImagen = $licenciaImagen;
        $this->antecedentesImagen= $antecedentesImagen;
        $this->fechaRegistro = $fechaRegistro;
        $this->Imagen = $Imagen;
        $this->tipoCarro = $tipoCarro; 
        $this->estado = $estado;
    }
    public function create(){
        # code...
        $stmt = $this->conn->prepare("INSERT INTO conductores (nombre, correo, telefono,licenciaImagen,antecendetesImagen,fechaRegistro
        Imagen, tipoCarro, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sss", $this->nombre, $this->correo, $this->telefono, $this->licenciaImagen, $this->correo, $this->antecedentesImagen,
        $this->fechaRegistro, $this->Imagen, $this->tipoCarro, $this->correo);
        $stmt->execute();
        $stmt->close();
        $this->conn->close();
    }
    public function getAll(){
        
        $sql = "SELECT * FROM conductores where estado = 1";
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