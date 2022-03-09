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

            if (!$user["Estado"]) {
                $this->view->error = "Usuario deshabilitado";
                $this->view->render("login/index");
                return;
            } 
            if (!password_verify($_POST["clave"],$user["Clave"])) {
                # code...
                $this->view->error = "Clave incorrecta";
                $this->view->render("login/index");
                return;
            }

            $_SESSION["ok"] = true;
            $_SESSION["nombre"] = $user["Nombre"];
            $_SESSION["correo"] = $user["Correo"];
            $_SESSION["user"] = $user;
            $this->view->render("main/index");

            
            
        }

        public function cerrar(){
            session_unset();
            session_destroy();
            $this->view->render("login/index");
            
        }
    }
?>