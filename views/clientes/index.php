<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="<?=URL?>public/css/usuarios.css">
</head>
<body class="my-custom-scroll-bar">
    <?php
        if ($this->reload) {
            header("Location: ".URL."clientes");
            die();
        }
        require "views/nav.php";
        echo $this->error;
       
    ?>
    <main class="m-4">
        <div class="row">
            <div class="col-8">
                <h2>Clientes Activos</h2>
                <div  class="my-custom-scroll-bar overflow-auto" style="height:70vh !important;">
                <table class="table table-dark table-hover mt-4 ">
                    <thead class="sticky-top">
                        <tr>
                            <?php
                            $clientes = $this->clientes;
                            $fields = $clientes[0];
                            foreach ($fields as $key => $value) {
                            ?>
                                <th scope="col"><?=$key?></th>
                            <?php
                            }
                            ?>
                            
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        foreach ($clientes as $value) {
                        ?>
                            
                            <tr  style="cursor:pointer;" onclick="location.href='/clientes/get/<?=$value['Id'] ?>'"  >
                                <?php
                                foreach ($fields as $key => $v) {
                                ?>
                                    <th scope="row"><?=$value["$key"]?></th>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>
            <h3>Clientes: <?=count($clientes);?></h3>
            </div>
        
        
                <!-- formulario -->
            <div class="col-4" >
                <form class="shadow rounded d-flex flex-column p-4" action="/clientes/crear" method="post" >
                    <h1>Crear Clientes</h1>
                    <input class="form-control my-2" placeholder="nombre" name="nombre" type="text">
                    <input class="form-control my-2" placeholder="correo" name="correo" type="text">
                    <input class="form-control my-2" placeholder="direccion" name="direccion" type="text">
                    <input class="form-control my-2" placeholder="telefono" name="telefono" type="tel">
                    <button class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            
             <div class="col-8">
                <h2>Clientes Inactivos</h2>
                <div  class="my-custom-scroll-bar overflow-auto" style="height:70vh !important;">
                <table class="table table-dark table-hover mt-4 ">
                    <thead class="sticky-top">
                        <tr>
                            <?php
                            $clientes = $this->inactivos;
                            $fields = $clientes[0];
                            foreach ($fields as $key => $value) {
                            ?>
                                <th scope="col"><?=$key?></th>
                            <?php
                            }
                            ?>
                            
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        foreach ($clientes as $value) {
                        ?>
                            
                            <tr  style="cursor:pointer;" onclick="location.href='/clientes/get/<?=$value['Id'] ?>'"  >
                                <?php
                                foreach ($fields as $key => $v) {
                                ?>
                                    <th scope="row"><?=$value["$key"]?></th>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>
            <h3>Clientes: <?=count($clientes);?></h3>
            </div>
        </div>


    </main>

</body>
</html>