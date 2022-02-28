<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
    session_start();
    // configuracion
    require_once 'config/constants.php';
    require_once 'config/db.php'; // clase conexion

    // clases base
    require_once 'libs/Controller.php';
    require_once 'libs/View.php';
    require_once 'libs/Model.php';
    require_once 'libs/App.php';
    // clases base
    $app = new App();

?>