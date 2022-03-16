<?php
    class Viajes extends Controller{

        public function __construct() {
            parent::__construct();
            $this->loadModel("Viaje");
        }

        public function crear(){

            if (!isset($_POST["cliente"]) || !isset($_POST["descripcion"]) || !isset($_POST["destino"]) || !isset($_POST["monto"])) {

                echo "Falta datos necesarios";
                die();
                
            }
            
            $this->model->clienteId = $_POST["cliente"];
            $this->model->conductorId = $_POST["conductor"];
            $this->model->monto = $_POST["monto"];
            $this->model->descripcion = $_POST["descripcion"];
            $this->model->destino = $_POST["destino"];
            $this->model->fecha = $_POST["fecha"];
            $this->model->duracion = $_POST["duracion"];
            $this->model->metodopago = $_POST["metodopago"];
            $this->model->porcentajeDeduccion = $_POST["porcentajededuccion"];

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
            $this->model->clienteId = $_POST["cliente"];
            $this->model->descripcion = $_POST["descripcion"];
            $this->model->destino = $_POST["destino"];
            $this->model->fecha = $_POST["fecha"];
            $this->model->duracion = $_POST["duracion"];
            $this->model->conductorId = $_POST["conductor"];
            $this->model->monto = $_POST["monto"];
            $this->model->id = $_POST["id"];

            
            $this->model->update();
            $this->view->id = $this->model->id;
            $this->view->reload = true;
            $this->view->render("viajes/viaje");
        }
        
        public function index(){
            $viajes = $this->model->getAll();
            
            $conductores = $this->model->query("conductores");
            $clientes = $this->model->query("clientes");
            $this->view->viajes = $viajes;  
            $this->view->conductores = $conductores;  
            $this->view->clientes = $clientes;  
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

       
    }
    
?>