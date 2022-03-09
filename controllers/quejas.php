<?php

class Quejas extends Controller{

        public function __construct() {
            parent::__construct();
            $this->loadModel("Queja");
            // render debe ir siempre al final para poder pasarleinformacion
        }      
        
        public function crear(){
            
            if (!isset($_POST["usuarioid"]) || !isset($_POST["viajeid"]) || !isset($_POST["clave"]) ) {

                echo "Falta datos necesarios";
                die();
                
            }

            $this->model->nombre = $_POST["nombre"];
            $this->model->correo = $_POST["correo"];
            $this->model->direccion = $_POST["direccion"];
            $this->model->telefono = $_POST["telefono"];
            $this->model->clave = $_POST["clave"];
            $this->model->create();
            $this->view->reload = true;
            $this->view->render("usuarios/index"); 
        }
       

        public function update(){

            if (!isset($_POST["id"])) {
                $this->view->error = "No proporciono un id de usuario para actualizar";
                $this->view->render("usuarios/usuario");
                die();
                
            }
            $this->model->nombre = $_POST["nombre"];
            $this->model->correo = $_POST["correo"];
            $this->model->id = $_POST["id"];

            
            // $this->model
            $this->model->update();
            $this->view->id = $this->model->id;
            $this->view->reload = true;
            $this->view->render("usuarios/usuario");
            
            
        }
        
        public function index(){
            $this->view->usuarios = $this->model->getAll(1);
            $this->view->inactivos = $this->model->getAll(0);
            $this->view->render("usuarios/index");
        }
        
        public function get($id){
            # code...
            $sql = "SELECT Id,Nombre,Correo,Estado FROM usuarios where Id = ?";
            $this->view->usuario = $this->model->get($id,$sql);
            $this->view->render("usuarios/usuario");
            
        }
        
        
        public function disable($id){
            # code...
            $this->model->disable($id);
            $this->view->id = $id;
            $this->view->reload = true;
            $this->view->render("usuarios/usuario");
                        
        }
}

?>