<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>

    <link rel="stylesheet" href="<?=URL?>public/css/usuarios.css">
</head>
<body class="my-custom-scroll-bar">

    <?php
        if ($this->reload) {
            header("Location: ".URL."usuarios");
            die();
        }
        // require "../nav.php";
        require "views/nav.php";
        echo $this->error;
       
    ?>
    <main class="m-4">
        <div class="row">

            <div class="col-8">
                <h2>Usuarios Activos</h2>
                
                <input id="buscar" 
                class="form-control mr-sm-2" 
                type="search" 
                placeholder="Search" />
                <div  class="my-custom-scroll-bar overflow-auto" style="height:70vh !important;">
                    <table id="table-activos" class="table table-dark table-hover mt-4 ">
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
                            
                            <tr  style="cursor:pointer;" onclick="location.href='/usuarios/get/<?=$value['Id'] ?>'"  >
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
            </div>
        
        
                <!-- formulario -->
            <div class="col-4" >
                <form class="shadow rounded d-flex flex-column p-4" action="/usuarios/crear" method="post" >
                    <h1>Crear Usuario</h1>
                    <input class="form-control my-2" placeholder="nombre" name="nombre" type="text">
                    <input class="form-control my-2" placeholder="correo" name="correo" type="text">
                    <input class="form-control my-2" placeholder="clave" name="clave" type="password">
                    <button class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            
             <div class="col-8">
                <h2>Usuarios Inactivos</h2>
                <div  class="my-custom-scroll-bar overflow-auto" style="height:70vh !important;">
                <table class="table table-dark table-hover mt-4 ">
                    <thead class="sticky-top">
                        <tr>
                            <?php
                            $usuarios = $this->inactivos;
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
                            
                            <tr  style="cursor:pointer;" onclick="location.href='/usuarios/get/<?=$value['Id'] ?>'"  >
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
            </div>
        </div>


    </main>
    
    <script >
        let stringusers = '<?=json_encode($this->usuarios)?>'
        let users = JSON.parse(stringusers)
        let usersCopy = users
        let tableActivos = document.getElementById("table-activos")
        let buscar = document.getElementById("buscar")
        buscar.onkeyup = ()=>{
            users = usersCopy.filter(u=>u.Nombre.includes(buscar.value) || u.Correo.includes(buscar.value)) 
            tableActivos.tBodies[0].innerHTML = ''
            users.forEach(e=>{
                let tr = document.createElement("tr")
                tr.style.cursor = "pointer" 
                tr.onclick= ()=>{
                 location.href =`/usuarios/get/${e.Id}`    
                }
                Object.keys(e).forEach(k=>{
                    let th = document.createElement("th")
                    th.textContent = e[k]
                    tr.append(th)
                })
                
                tableActivos.tBodies[0].append(tr)

            })

        }
        

    </script>

</body>
</html>