<?php
    class NotFound extends Controller{
        public function __construct() {
            parent::__construct();
            // $this->view->render("notfound");
            
        }
        public function render($pagina){
            # code...
            $this->view->pagina = $pagina;
            $this->view->render("notfound");
        }
    }
?>