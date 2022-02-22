<?php
    class Controller {
        public function __construct() {
            
            $this->view = new View();
        }
        public function loadModel($model){
            $url = "models/$model.php";
            if (file_exists($url)) {
                require $url;
                $this->model = new $model();
            }
        }
    }
?>