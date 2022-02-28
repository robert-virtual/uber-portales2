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
        echo $this->error; 
        require 'views/nav.php';
        
    ?>
    <main class="m-4 ">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-start gap-5">
                <button onclick="location.href='/usuarios'" class="btn" style="width:50px;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                </button>
                <form class="d-flex flex-column" action="/usuarios/update" method="post" >
                    <h1>Actualizar <?=$this->usuario["Nombre"];?></h1>
                    <input hidden value="<?=$this->usuario["Id"];?>" name="id" type="text">
                    <label for="nombre">Nombre</label>
                    <input class="form-control my-2" value="<?=$this->usuario["Nombre"];?>" placeholder="nombre" name="nombre" type="text">
                    <label for="correo">Correo</label>
                    <input class="form-control my-2" value="<?=$this->usuario["Correo"];?>" placeholder="correo" name="correo" type="text">
                    <button class="btn btn-primary">Actualizar</button>
                    
                </form>

    
                
            </div>  
            <div>
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

        </div>

    </main>
    
</body>
</html>