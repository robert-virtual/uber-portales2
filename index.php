<?php
    // configuracion
    require_once 'config/constants.php';
    require_once 'config/db.php'; // clase conexion

    // modelos
    require_once 'models/Usuario.php';
    // controladores base
    require_once 'libs/Controller.php';
    require_once 'libs/View.php';
    require_once 'libs/Model.php';
    require_once 'libs/App.php';
    $app = new App();

?>