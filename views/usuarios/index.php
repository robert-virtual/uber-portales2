<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="<?=URL?>public/css/usuarios.css">
</head>
<body>

    <?php
        if ($this->reload) {
            header("Location: ".URL."usuarios");
            die();
        }
        // require "../nav.php";
        require "views/nav.php";
        echo $this->error;
       
    ?>
    <main class="m-4 row">
    <div class="col-8">
        <div  class="my-custom-scroll-bar overflow-auto" style="height:70vh !important;">
        <table class="table table-dark table-hover mt-4 ">
            <thead class="sticky-top">
                <tr>
                    <?php
                    $usuarios = $this->usuarios;
                    $fields = $usuarios[0];
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
                foreach ($usuarios as $value) {
                ?>
                    
                    <tr data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor:pointer;"  onclick='aux = <?=json_encode($value);?>;Object.keys(aux).forEach(key=>CURRENT_USER[key]=aux[key])'>
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
        <h3>Usuarios: <?=count($usuarios);?></h3>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-start">
                <form class="d-flex flex-column" action="/usuarios/update" method="post" >
                    <h2 id="update">Actualizar</h2>
                    <label for="nombre">Nombre</label>
                    <input id="nombre" class="form-control my-2"  placeholder="nombre" name="nombre" type="text">
                    <label for="correo">Correo</label>
                    <input id="correo" class="form-control my-2"  placeholder="correo" name="correo" type="text">
                    <button class="btn btn-primary">Actualizar</button>
                </form>

                
                
                <button id="btn-desactivar" onclick='location.replace(`/usuarios/disable/${CURRENT_USER.Id}`)' class="btn btn-danger mt-4">Desactivar</button>
            
                <button id="btn-activar" onclick='location.replace(`/usuarios/disable/${CURRENT_USER.Id}`)' class="btn btn-success mt-4">Activar</button>
            


            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
        
    <div class="col-4" >
        <form class="shadow rounded d-flex flex-column p-4" action="/usuarios/crear" method="post" >
            <h1>Crear Usuario</h1>
            <input class="form-control my-2" placeholder="nombre" name="nombre" type="text">
            <input class="form-control my-2" placeholder="correo" name="correo" type="text">
            <input class="form-control my-2" placeholder="clave" name="clave" type="password">
            <button class="btn btn-primary">Crear</button>
        </form>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="<?=URL?>public/js/usuarios.js"></script>
</body>
</html>