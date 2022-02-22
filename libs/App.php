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
        
        if ($url[0] == "usuarios" && !$url[1]) {
            $url[1] = "obtenerTodos";
            $url[2] = "";
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