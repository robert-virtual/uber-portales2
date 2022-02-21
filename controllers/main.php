<?php
    class Main extends Controller{
        public function __construct() {
            parent::__construct();
            $this->view->render("main");

        }
        public function hola()
        {
            echo "Metodo Hola ejecutado!!!";
        }
    }
?>