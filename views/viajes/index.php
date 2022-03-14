<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes</title>
    <link rel="stylesheet" href="<?=URL?>public/css/viajes.css">
</head>

<body class="my-custom-scroll-bar">

    <?php
        if ($this->reload) {
            header("Location: ".URL."viajes");
            die();
        }
        // require "../nav.php";
        require "views/nav.php";
        echo $this->error;
       
    ?>
    <main class="m-4">
        <div class="row">

            <div class="col-8">
                <h2>Viajes</h2>
                <div  class="my-custom-scroll-bar overflow-auto" style="height:70vh !important;">
                <table class="table table-dark table-hover mt-4 ">
                    <thead class="sticky-top">
                        <tr>
                            <?php
                            $viajes = $this->viajes;
                            $fields = $viajes[0];
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
                        foreach ($viajes as $value) {
                        ?>
                            
                            <tr  style="cursor:pointer;" onclick="location.href='/viajes/get/<?=$value['Id'] ?>'"  >
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
            <h3>Viajes: <?=count($viajes);?></h3>
            </div>
        
                <!-- formulario -->
            <div class="col-4" >
                <form class="shadow rounded d-flex flex-column p-4" action="/viajes/crear" method="post" >
                    <h1>Crear Viaje</h1>
                    <input class="form-control my-2" placeholder="clienteId" name="clienteId" type="text">
                    <input class="form-control my-2" placeholder="descripcion" name="descripcion" type="text">
                    <input class="form-control my-2" placeholder="destino" name="destino" type="text">
                    <p>
                      Monto:
                          <select name="monto">
                              <option>Efectivo</option>
                              <option>Credito</option>
                        </select>
                    </p>
                    
                    <button class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
      


    </main>
    
</body>
</html>
    </main>
    
</body>
</html>
