<?php
    class Conductores extends Controller{
        public function __construct() {
            parent::__construct();// llamar al conxructor de Controller
            $this->loadModel("Conductor");
            $this->view->render("conductores/index");




        }
       
        
        
    }

    
?>