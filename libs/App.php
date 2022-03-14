<?php
class App {
    public function __construct() {
        $url = $_GET["url"]; // strins 
        $url = rtrim($url,"/"); // removes "/" insnecesarios
        $url = explode("/",$url); // array 
        
        if (!$url[0]) {
            # code...
            $url[0] = "login";
            if ($_SESSION["ok"]) {
                # code...
                $url[0] = "usuarios";
    
            }
        } 
        
        if (!$url[1]) {
            $url[1] = "index";
            // $url[2] = "";
        } 
        if (!isset($_SESSION["ok"])) {
            # code...
            $url[0] = "login";

        }

        $controller = "controllers/$url[0].php";// ruta al controllador
        
        if (!file_exists($controller)) {
            # code...
            $controller = "controllers/notfound.php";
            $url[2] = $url[0]; // pagina buscada
            $url[0] = "NotFound"; // controlador
            $url[1] = "render"; // metodo a ejecutar

        }
        require_once $controller;
        $controller = new $url[0]; // new Main()

        if ($url[1]) {
           
            $controller->{$url[1]}($url[2]); // ejecutar meto del controllador
        }

    }
}


?>