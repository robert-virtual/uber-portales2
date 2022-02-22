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
            $this->view->render("usuarios");
            
            
        }
        
        public function obtenerTodos($any = ""){
            # code...
            $this->view->usuarios = $this->model->getAll();
            $this->view->render("usuarios");

            
        }
        
        public function obtenerUno($id){
            # code...
            
            $this->view->usuario = $this->model->get($id);
            
        }
        

        public function eliminar(){
            # code...
            echo "obtenerTodos";
            
        }
}

?>