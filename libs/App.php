<?php
class App {
    public function __construct() {
        $url = $_GET["url"]; // strins 
        $url = rtrim($url,"/"); // array
        $url = explode("/",$url);// removes / insnecesarios

        if (!$url[0]) {
            # code...
            $url[0] = "main";
        } 
        $controller = "controllers/$url[0].php";// ruta al controllador
        
        if (!file_exists($controller)) {
            # code...
            $controller = "controllers/notfound.php";
            $url[0] = "NotFound";

        }
        require_once $controller;
        $controller = new $url[0]; // new Main()

        if ($url[1]) {
            # code...
            $controller->{$url[1]}(); // ejecutar meto del controllador
        }

    }
}


?>