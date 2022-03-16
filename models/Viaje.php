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
        public $metodopago = "";

        public function __construct(
            $clienteId = "",
            $descripcion = "",
            $destino = "",
            $fecha = "",
            $duracion = "",
            $conductorId = "",
            $monto = "",$porcentajeDeduccion = ""
        ) {
            parent::__construct();
            $this->conn = $this->db->connect();
            $this->clienteId = $clienteId;
            $this->descripcion = $descripcion;
            $this->destino = $destino;
            $this->fecha = $fecha;
            $this->duracion = $duracion;
            $this->conductorId = $conductorId;
            $this->monto = $monto;
            $this->porcentajeDeduccion = $porcentajeDeduccion;
        }
        
        public function getAll() {
            $sql = "SELECT * FROM ViajesView";
            $this->conn = $this->db->connect();
            $result = $this->conn->query($sql);
            $viajes = [];
            if($result->num_rows == 0){
                $this->view->error = "NO existen datos";
            }
            while($row = $result->fetch_assoc()){
                $viajes[] = $row;
            }
            $this->conn->close();
            return $viajes;
        }

        public function create(){
            $stmt = $this->conn->prepare("INSERT INTO viajes(clienteId,descripcion,destino,duracion,conductorId,monto,porcentajeDeducccion,metodoPago)  VALUES (?,?,?,?,?,?,?,?)" );
            $stmt->bind_param("isssidds", $this->clienteId,  $this->descripcion, $this->destino, $this->duracion,$this->conductorId, $this->monto, $this->porcentajeDeduccion,$this->metodopago);
            $stmt->execute();
            $stmt->close();
            $this->conn->close();
        }

        public function update(){
            $sql = "UPDATE viajes SET clienteId = IF(? != '',?, clienteId), descripcion = IF(? != '', ?,descripcion), destino = IF(? != '', ?,destino) 
            , fecha = IF(? != '', ?,fecha), duracion = IF(? != '', ?,duracion), conductorId = IF(? != '', ?,conductorId), monto = IF(? != '', ?,monto)
            , porcentajeDeduccion = IF(? != '', ?,porcentajeDeduccion)WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("issdsiff",$this->clienteId,$this->clienteId,$this->descripcion ,$this->descripcion,$this->destino,$this->destino
            ,$this->fecha,$this->fecha,$this->duracion,$this->duracion,$this->conductorId,$this->conductorId,$this->monto,$this->monto
            ,$this->porcentajeDuracion,$this->porcentajeDuracion , $this->id);
            $stmt->execute();
            $stmt->close();
            $this->conn->close();
        }

        
    }
?>
