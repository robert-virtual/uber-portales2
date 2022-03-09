<?php
    class Clientes extends Controller{
        public function __construct() {
            parent::__construct();
            $this->loadModel("Cliente");

        }

                
        public function index(){
            $clientes = $this->model->getAll();
            $this->view->clientes = $clientes;  
            //inactivos
            $this->view->inactivos = $this->model->getAll(0);  
            $this->view->render("clientes/index");
            
        }
       
        public function crear(){
            
            if (!isset($_POST["nombre"]) || !isset($_POST["correo"])) {

                echo "Falta datos necesarios";
                die();
                
            }

            $user = new Cliente($_POST["nombre"],$_POST["correo"],$_POST["direccion"],$_POST["telefono"]);
            
            $user->create();
            $this->view->reload = true;
            $this->view->render("clientes/index"); 
        }

    
        public function update(){

            if (!isset($_POST["id"])) {
                $this->view->error = "No proporciono un id del cliente para actualizar";
                $this->view->render("clientes/cliente");
                die();
                
            }
            $this->model->nombre = $_POST["nombre"];
            $this->model->correo = $_POST["correo"];
            $this->model->direccion = $_POST["direccion"];
            $this->model->telefono = $_POST["telefono"];
            $this->model->id = $_POST["id"];


            $this->model->update();
            $this->view->id = $this->model->id;
            $this->view->reload = true;
            $this->view->render("clientes/cliente");
            
        }
        
        public function get($id){


            $sql = "SELECT Id,nombre,correo,direccion,telefono,Estado FROM clientes where Id = ?";
            $this->view->cliente = $this->model->get($id,$sql);

            $this->view->render("clientes/cliente");
            
        }

        public function disable($id){
            
            $this->model->disable($id);
            $this->view->id = $id;
            $this->view->reload = true;
            $this->view->render("clientes/cliente");
                        
        }


        
    }

    
?>