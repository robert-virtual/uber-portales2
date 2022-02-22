<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
    <?php
        if ($this->reload) {
            header("Location: ".URL."usuarios/get/$this->id");
            die();
        }
        require 'views/nav.php';
        
    ?>
    <main class="m-4 ">
        <div class="d-flex justify-content-between align-items-start">
            <form class="d-flex flex-column" action="/usuarios/update" method="post" >
                <h1>Actualizar <?=$this->usuario["Nombre"];?></h1>
                <label for="nombre">Nombre</label>
                <input class="form-control my-2" value="<?=$this->usuario["Nombre"];?>" placeholder="nombre" name="nombre" type="text">
                <label for="correo">Correo</label>
                <input class="form-control my-2" value="<?=$this->usuario["Correo"];?>" placeholder="correo" name="correo" type="text">
                <button class="btn btn-primary">Actualizar</button>
            </form>

            
            <?php
                if ($this->usuario["Estado"]) {
            ?>
                <button onclick='location.replace("/usuarios/disable/<?=$this->usuario["Id"]?>")' class="btn btn-danger mt-4">Desactivar</button>
            <?php
                }else{
            ?>
                <button onclick='location.replace("/usuarios/disable/<?=$this->usuario["Id"]?>")' class="btn btn-success mt-4">Activar</button>
            <?php
                }
            ?>


        </div>
    </main>
    
</body>
</html>