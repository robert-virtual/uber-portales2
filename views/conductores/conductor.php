<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conductores</title>
</head>
<body class="my-custom-scroll-bar">
    <?php
        if ($this->reload) {
            header("Location: ".URL."conductores/get/$this->id");
            die();
        }
        echo $this->error; 
        require 'views/nav.php';
        
    ?>
    <main class="m-4 ">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-start gap-5">
                <button onclick="location.href='/conductores'" class="btn" style="width:50px;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                </button>
                <form class="d-flex flex-column" action="/conductores/update" method="post" >
                    <h1>Actualizar <?=$this->conductor["nombre"];?></h1>
                    <input hidden value='<?=$this->conductor["Id"];?>' name="id" type="text" />
                    <label for="nombre">Nombre</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?=$this->conductor["nombre"];?>" placeholder="nombre" name="nombre" type="text">
                    <label for="correo">Correo</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?=$this->conductor["correo"];?>" placeholder="correo" name="correo" type="text">
                    <label for="telefono">Telefono</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?=$this->conductor["telefono"];?>" placeholder="telefono" name="telefono" type="text">
                    <div class="">
                        <?php
                            if ($this->condutor["Estado"]) {
                                ?>
                            <button onclick='location.replace("/conductores/disable/<?=$this->conductor["Id"]?>")' class="btn btn-danger ">Desactivar</button>
                        <?php
                            }else{
                        ?>
                            <button onclick='location.replace("/conductores/disable/<?=$this->conductor["Id"]?>")' class="btn btn-success ">Activar</button>
                        <?php
                            }
                        ?>
                            <button class="btn btn-primary ms-4">Actualizar</button>
                    </div>
                    
                </form>

    
                
            </div>  
            

        </div>

    </main>
    
</body>
</html>