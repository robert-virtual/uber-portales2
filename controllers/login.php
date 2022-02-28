<?php
    class Login extends Controller{
        public function __construct() {
            parent::__construct();
            $this->loadModel("Usuario");
        }
        public function index(){
            $this->view->render("login/index");
        }
        public function entrar(){

            $this->model->correo = $_POST["correo"];
            $this->model->clave = $_POST["clave"];
            $user = $this->model->login();
            if (!$user) {
                $this->view->error = "Credenciales incorrectas";
                $this->view->render("login/index");
                return;
            } 
            $_SESSION["ok"] = true;
            $_SESSION["nombre"] = $user["nombre"];
            $_SESSION["correo"] = $user["correo"];
            $this->view->render("main/index");

            
            
        }

        public function cerrar(){
            session_unset();
            session_destroy();
            $this->view->render("login/index");
            
        }
    }
?>