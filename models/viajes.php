<?php
    class Viaje extends Model {
        public $id = "";
        public $clienteId = "";
        public $descripcion = "";
        public $destino = "";
        public $fecha = "";
        public $duracion = "";
        public $conductorId = "";
        public $monto = "";
        public $porcentajeDeduccion = "";

        public function __construct($clienteId = "",$descripcion = "",$destino = "",$fecha = "",
                                    $duracion = "",$conductorId = "",$monto = "",$porcentajeDeduccion = ""){
            parent::__construct();
            $this-> conn = $this->db->connect();
            $this-> cliente = $clienteId;
            $this-> descripcion = $descripcion;
            $this-> destino = $destino;
            $this-> fecha = $fecha;
            $this-> duracion = $duracion;
            $this-> conductor = $conductorId;
            $this-> monto = $monto;
            $this-> porcentajeDeduccion = $porcentajeDeduccion;
        }

        public function create(){
            $stmt = $this->conn->prepare("INSERT INTO viajes(clienteId, descripcion, destino, fecha, duracion, conductor, monto, porcentajeDeduccion VALUES (?,?,?,?,?,?,?,?" );
            $stmt->bind_param("sss", $this->clienteId, $this->descripcion, $this->destino, $this->fecha, $this->duracion, $this->conductor, $this->monto, $this->porcentajeDeduccion);
            $stmt->execute();
            $this->conn->close();
        }

        public function getAll() {
            $sql = "SELECT * FROM viajes";
            $result = $this->conn->query($sql);
            $viajes = [];
            if($result->num_rows == 0){
                $this->view->error = "NO existen datos";
            }
            while($row = $result->fetch-assoc()){
                $viajes[]= $row;
            }
            $this->conn->close();
            return $viajes;
        }

        
    }
?>