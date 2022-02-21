<?php
    class Controller extends Conexion{
        public function __construct() {
            parent::__construct();
            $this->view = new View();
        }
    }
?>