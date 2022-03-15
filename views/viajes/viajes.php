<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes</title>
</head>
<body class="my-custom-scroll-bar">
    <?php
        if ($this->reload) {
            header("Location: ".URL."viajes/get/$this->id");
            die();
        }
        echo $this->error; 
        require 'views/nav.php';
        
    ?>
    <main class="m-4 ">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-start gap-5">
                <button onclick="location.href='/viajes'" class="btn" style="width:50px;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                </button>
                <form class="d-flex flex-column" action="/viajes/update" method="post" >
                    <h1>Actualizar <?=$this->viaje["descripcion"];?></h1>
                    <input hidden value='<?=$this->viaje["Id"];?>' name="id" type="text" />
                    <label for="descripcion">Descripcion</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?=$this->viaje["descripcion"];?>" placeholder="descrpcion" name="descripcion" type="text">
                    <label for="destino">Destino</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?=$this->viaje["destino"];?>" placeholder="destino" name="destino" type="text">
                    <label for="fecha">Fecha</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?=$this->viaje["fecha"];?>" placeholder="fecha" name="fecha" type="text">
                    <label for="duracion">Duracion</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?=$this->viaje["duracion"];?>" placeholder="duracion" name="duracion" type="text">
                    <label for="monto">Monto</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?=$this->viaje["monto"];?>" placeholder="monto" name="monto" type="text">
                    <label for="porcentajeDeduccion">porcentajeDeduccion</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?=$this->viaje["porcentajeDeduccion"];?>" placeholder="porcentajeDeduccion" name="porcentajeDeduccion" type="text">
                    <div class="">
                        <?php
                            if ($this->viaje[]) {
                                ?>
                            <button onclick='location.replace("/viajes/disable/<?=$this->viaje["Id"]?>")' class="btn btn-danger ">Desactivar</button>
                        <?php
                            }else{
                        ?>
                            <button onclick='location.replace("/viajes/disable/<?=$this->viaje["Id"]?>")' class="btn btn-success ">Activar</button>
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