<?php
    class Conductores extends Controller{
        public function __construct() {
            parent::__construct();// llamar al conxructor de Controller
            $this->loadModel("Conductor");
            
        }
        
        public function index(){
            // lo carga por defecto
            $conductores = $this->model->getAll();
            $this->view->conductores = $conductores; 
            $this->view->render("conductores/index");
            
        }
        public function crear(Type $var = null){
            # code...
            $this->view->render("conductores/conductor");
        }
        
    }

    
?>