<?php

class Usuarios extends Controller{

        public function __construct() {
            parent::__construct();
            $this->loadModel("Usuario");
            // render debe ir siempre al final para poder pasarleinformacion
        }      
        
        
        public function crear(){
            # code...
            if (!isset($_POST["nombre"])) {
                # code...
                echo "Falta datos necesarios";
                
                die();
            }
            // $this->model
            $user = new Usuario($_POST["nombre"],$_POST["correo"],$_POST["clave"]);
            $user->create();
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
            $this->view->usuarios = $this->model->getAll();
            $this->view->render("usuarios/index");
        }
        
        public function get($id){
            # code...
            
            $this->view->usuario = $this->model->get($id);
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