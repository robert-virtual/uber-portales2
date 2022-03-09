<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conductores</title>
    <link rel="stylesheet" href="<?=URL?>public/css/usuarios.css">
</head>
<body class="my-custom-scroll-bar">

    <?php
        if ($this->reload) {
            header("Location: ".URL."conductores");
            die();
        }
        // require "../nav.php";
        require "views/nav.php";
        echo $this->error;
       
    ?>
    <main class="m-4">
        <div class="row">

            <div class="col-8">
                <h2>Conductores</h2>
                <div  class="my-custom-scroll-bar overflow-auto" style="height:70vh !important;">
                <table class="table table-dark table-hover mt-4 ">
                    <thead class="sticky-top">
                        <tr>
                            <?php
                            $conductores = $this->conductores;
                            $fields = $conductores[0];
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
                        foreach ($conductores as $value) {
                        ?>
                            
                            <tr  style="cursor:pointer;" onclick="location.href='/conductores/get/<?=$value['Id'] ?>'"  >
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
            <h3>Conductores: <?=count($conductores);?></h3>
            </div>
        
                <!-- formulario -->
            <div class="col-4" >
                <form class="shadow rounded d-flex flex-column p-4" action="/conductores/crear" method="post" >
                    <h1>Crear conductor</h1>
                    <input class="form-control my-2" placeholder="nombre" name="nombre" type="text">
                    <input class="form-control my-2" placeholder="correo" name="correo" type="text">
                    <input class="form-control my-2" max="8" placeholder="Telefono" name="telefono" type="tel">
                    <p>
                      Tipo de carro:
                          <select name="tipoCarro">
                              <option>Lujo</option>
                              <option>Normal</option>
                        </select>
                    </p>
                    <label for="licencia">Licencia</label>
                    <input class="form-control my-2" placeholder="Licencia" name="Licencia" type="file">
                    <label for="antecedentes">Antecedentes</label>
                    <input class="form-control my-2" placeholder="Licencia" name="Antecedente" type="file">
                    <label for="perfil">Foto de perfil</label>
                    <input class="form-control my-2" placeholder="Licencia" name="perfil" type="file">
                   
                  
                    <button class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
        <hr>
    </main>

    <div class="row">
            
             <div class="col-8">
                <h2>Conductores Inactivos</h2>
                <div  class="my-custom-scroll-bar overflow-auto" style="height:70vh !important;">
                <table class="table table-dark table-hover mt-4 ">
                    <thead class="sticky-top">
                        <tr>
                            <?php
                            $conductores = $this->inactivos;
                            $fields = $conductores[0];
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
                        foreach ($conductores as $value) {
                        ?>
                            
                            <tr  style="cursor:pointer;" onclick="location.href='/conductores/get/<?=$value['Id'] ?>'"  >
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
            <h3>Conductores: <?=count($conductores);?></h3>
            </div>
        </div>

    
</body>
</html>