<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes</title>
    <link rel="stylesheet" href="<?=URL?>public/css/usuarios.css">
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
                            
                            <tr  style="cursor:pointer;"   >
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
                    <input name="conductor" class="form-control my-2" list="conductores"  placeholder="conductor">
                    <datalist id="conductores" >
                        <?php
                        foreach ($this->conductores as $conductor) {
                            # code...
                        ?>
                        <option value="<?=$conductor['id']?>"><?=$conductor['nombre']?></option>
                        <?php
                            }
                        
                        ?>

                    </datalist>
                    <input name="cliente" class="form-control my-2" list="clientes"  placeholder="cliente">
                    <datalist id="clientes" >
                        <?php
                        foreach ($this->clientes as $cliente) {
                            # code...
                        ?>
                        <option value="<?=$cliente['id']?>"><?=$cliente['nombre']?></option>
                        <?php
                            }
                        
                        ?>
                    </datalist>
                    <input class="form-control my-2" placeholder="monto" name="monto" type="number">
                    <input class="form-control my-2" placeholder="descripcion" name="descripcion" type="text">
                    <input class="form-control my-2" placeholder="destino" name="destino" type="text">
                    <input class="form-control my-2" placeholder="fecha" name="fecha" type="date">
                    <input class="form-control my-2" placeholder="duracion" name="duracion" type="text" >
                    <input class="form-control my-2" placeholder="porcentajededuccion" name="porcentajededuccion" type="number" step=".01">
                    <p>
                      Metodo Pago:
                          <select name="metodopago" class="form-control my-2">
                              <option value="Efectivo">Efectivo</option>
                              <option value="Credito">Credito</option>
                        </select>
                    </p>
                    
                    <button class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

       
      


    </main>
    
</body>
</html>

