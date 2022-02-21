<?php
    class Viaje {
        public $id = "";
        public $clienteId = "";
        public $descripcion = "";
        public $destino = "";
        public $fecha = "";
        public $duracion = "";
        public $conductorId = "";
        public $monto = "";
        public $porcentajeDeduccion = "";

        public function __construct($id,$clienteId,$descripcion,$destino,$fecha,$duracion,$conductorId,$monto,$porcentajeDeduccion){
            $this-> id = $id;
            $this-> cliente = $clienteId;
            $this-> descripcion = $descripcion;
            $this-> destino = $destino;
            $this-> fecha = $fecha;
            $this-> duracion = $duracion;
            $this-> conductor = $conductorId;
            $this-> monto = $monto;
            $this-> porcentajeDeduccion = $porcentajeDeduccion;
            echo "<div> Viaje Guardado </div>";
        }
    }
?>