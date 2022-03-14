<?php
    class Viajes extends Controller{

        public function __construct() {
            parent::__construct();
            $this->loadModel("Viaje");
        }

        public function crear(){

            if (!isset($_POST["clienteId"]) || !isset($_POST["descripcion"]) || !isset($_POST["destino"]) || !isset($_POST["monto"])) {

                echo "Falta datos necesarios";
                die();
                
            }
            
            $this->view->clienteId = $_POST["clienteId"];
            $this->view->desccripcion = $_POST["descripcion"];
            $this->view->destino = $_POST["destino"];
            $this->view->fecha = $_POST["fecha"];
            $this->view->duracion = $_POST["duracion"];
            $this->view->conductorId = $_POST["conductorId"];
            $this->view->monto = $_POST["monto"];
            $this->view->porcentajeDeduccion = $_POST["porcentajeDeduccion"];
            $this->model->create();
            $this->view->reload = true;
            $this->view->render("viajes/index"); 
        }

        public function update(){

            if (!isset($_POST["id"])) {
                $this->view->error = "No proporciono un id de viaje para actualizar";
                $this->view->render("viajes/viaje");
                die();
                
            }
            $this->model->clienteId = $_POST["clienteId"];
            $this->model->descripcion = $_POST["descripcion"];
            $this->model->destino = $_POST["destino"];
            $this->model->fecha = $_POST["fecha"];
            $this->model->duracion = $_POST["duracion"];
            $this->model->conductorId = $_POST["conductorId"];
            $this->model->monto = $_POST["monto"];
            $this->model->porcentajeDeduccion = $_POST["porcentajeDeduccion"];
            $this->model->id = $_POST["id"];

            
            $this->model->update();
            $this->view->id = $this->model->id;
            $this->view->reload = true;
            $this->view->render("viajes/viaje");
        }
        
        public function index(){
            $this->view->viajes = $this->model->getAll(1);  
            $this->view->render("viajes/index");
        }

        public function get($id){
            $sql = "SELECT Id,clienteId,destino,fecha,duracion,conductorId,monto,porcentajeDeduccion FROM viajes where Id = ?";
            $this->view->viaje = $this->model->get($id,$sql);

            $this->view->render("viajes/viaje");
            
        }

        public function disable($id){
            $this->model->disable($id);
            $this->view->id = $id;
            $this->view->reload = true;
            $this->view->render("viajes/viaje");               
        }

       /*
        public function crear(){
            if (!isset($_POST["clienteId"]) || !isset($_POST["descripcion"])) {
                echo "Falta datos necesarios";
                die();
                
            }

            $user = new viaje($_POST["clienteId"],$_POST["descripcion"],$_POST["destino"],$_POST["fecha"],$_POST["duracion"],$_POST["conductorId"],$_POST["monto"],$_POST["porcentajeDeduccion"]);
            
            $user->create();
            $this->view->reload = true;
            $this->view->render("viajes/index"); 
        }

    
        public function update(){

            if (!isset($_POST["id"])) {
                $this->view->error = "No proporciono un id de viaje para actualizar";
                $this->view->render("viajes/viaje");
                die();
                
            }
            $this->model->clienteId = $_POST["clienteId"];
            $this->model->descripcion = $_POST["descripcion"];
            $this->model->destino = $_POST["destino"];
            $this->model->fecha = $_POST["fecha"];
            $this->model->duracion = $_POST["duracion"];
            $this->model->conductorId = $_POST["conductorId"];
            $this->model->monto = $_POST["monto"];
            $this->model->porcentajeDeduccion = $_POST["porcentajeDeduccion"];
            $this->model->id = $_POST["id"];

            
            $this->model->update();
            $this->view->id = $this->model->id;
            $this->view->reload = true;
            $this->view->render("viajes/viaje");
        }
        
        public function get($id){
            $sql = "SELECT Id,clienteId,destino,fecha,duracion,conductorId,monto,porcentajeDeduccion FROM viajes where Id = ?";
            $this->view->viaje = $this->model->get($id,$sql);

            $this->view->render("viajes/viaje");
            
        }

        public function disable($id){
            # code...
            $this->model->disable($id);
            $this->view->id = $id;
            $this->view->reload = true;
            $this->view->render("viajes/viaje");               
        }*/
    }
    
?>