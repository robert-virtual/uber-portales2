<?php

class Quejas extends Controller{

        public function __construct() {
            parent::__construct();
            $this->loadModel("Queja");
        }
        
        public function index(){
            // lo carga por defecto
            $quejas = $this->model->getAll();
            $this->view->quejas = $quejas;  
            $this->view->render("quejas/index");            
        }
        
        public function crear(){
            if (!isset($_POST["usuarioid"]) || !isset($_POST["viajeid"]) || !isset($_POST["queja"])) {
                echo "Falta datos necesarios";
                die();   
            }

            $user = new Queja($_POST["usuarioid"],$_POST["viajeid"],$_POST["queja"]);

            $user->create();
            $this->view->reload = true;
            $this->view->render("quejas/index"); 
        }
       
        public function update(){

            if (!isset($_POST["id"])) {
                $this->view->error = "No proporciono un id para actualizar";
                $this->view->render("quejas/queja");
                die();
                
            }
            $this->model->usuarioid = $_POST["usuarioid"];
            $this->model->viajeid = $_POST["viajeid"];
            $this->model->queja = $_POST["queja"];
            $this->model->id = $_POST["id"];

            
            $this->model->update();
            $this->view->id = $this->model->id;
            $this->view->reload = true;
            $this->view->render("quejas/queja"); 
        }
        
        public function get($id){
            $sql = "SELECT * FROM quejas where Id = ?";
            $this->view->queja = $this->model->get($id,$sql);
            $this->view->render("quejas/queja");
            
        }
}
