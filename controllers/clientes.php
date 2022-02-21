<?php
    class Clientes extends Controller{
        public function __construct() {
            parent::__construct();// llamar al conxructor de Controller
            $this->view->render("clientes");

        }
        
    }
?>