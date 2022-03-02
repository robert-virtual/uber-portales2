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
       
        public function crear(){
            # code...
            if (!isset($_POST["nombre"]) || !isset($_POST["correo"])) {
                # code...
                echo "Falta datos necesarios";
                die();
                
            }
            // $this->model

            $user = new Conductor($_POST["nombre"],$_POST["correo"],$_POST["telefono"],$_POST["tipoCarro"]);
            
            $user->create();
            $this->view->reload = true;
            $this->view->render("conductores/index"); 
        }

    
        public function update(){

            if (!isset($_POST["id"])) {
                $this->view->error = "No proporciono un id de conductor para actualizar";
                $this->view->render("conductores/conductor");
                die();
                
            }
            $this->model->nombre = $_POST["nombre"];
            $this->model->correo = $_POST["correo"];
            $this->model->telefono = $_POST["telefono"];
            $this->model->id = $_POST["id"];

            
            // $this->model
            $this->model->update();
            $this->view->id = $this->model->id;
            $this->view->reload = true;
            $this->view->render("conductores/conductor");
            
            
        }
        
        public function get($id){
            # code...
            
            
            $sql = "SELECT Id,Nombre,Correo,Telefono FROM conductores where Id = ?";
            $this->view->usuario = $this->model->get($id,$sql);

            $this->view->render("conductores/conductor");
            
        }

        public function disable($id){
            # code...
            $this->model->disable($id);
            $this->view->id = $id;
            $this->view->reload = true;
            $this->view->render("conductores/conductor");
                        
        }







    }

    
?>