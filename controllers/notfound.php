<?php
    class NotFound extends Controller{
        public function __construct() {
            parent::__construct();
            $this->view->render("notfound");

        }
    }
?>