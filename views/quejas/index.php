<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quejas</title>
    <link rel="stylesheet" href="<?= URL ?>public/css/usuarios.css">
</head>

<body class="my-custom-scroll-bar">

    <?php
    if ($this->reload) {
        header("Location: " . URL . "quejas");
        die();
    }
    require "views/nav.php";
    echo $this->error;

    ?>
    <main class="m-4">
        <div class="row">

            <div class="col-8">
                <h2>Quejas</h2>
                <div class="my-custom-scroll-bar overflow-auto" style="height:70vh !important;">
                    <table class="table table-dark table-hover mt-4 ">
                        <thead class="sticky-top">
                            <tr>
                                <?php
                                $quejas = $this->quejas;
                                $fields = $quejas[0];
                                foreach ($fields as $key => $value) {
                                ?>
                                    <th scope="col"><?= $key ?></th>
                                <?php
                                }
                                ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($quejas as $value) {
                            ?>

                                <tr style="cursor:pointer;">
                                    <?php
                                    foreach ($fields as $key => $v) {
                                    ?>
                                        <th scope="row"><?= $value["$key"] ?></th>
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
                <h3>Quejas: <?= count($quejas); ?></h3>
            </div>


            <!-- formulario -->
            <div class="col-4">
                <form class="shadow rounded d-flex flex-column p-4" action="/quejas/crear" method="post">
                    <h1>Ingresar Queja</h1>
                    <input class="form-control my-2" placeholder="ID de Usuario" name="usuarioid" type="text">
                    <input class="form-control my-2" placeholder="ID de Viaje" name="viajeid" type="text">
                    <p>
                        Queja:
                        <input  class="form-control my-2" type="text" placeholder="Ingrese el tipo de queja" list="list-quejas" name="queja" />
                        <datalist id="list-quejas">
                            <option>Conductor no llegó a tiempo</option>
                            <option>Conductor no llegó</option>
                            <option>El cobro fue mayor que el acordado</option>
                            <option>Conductor Irrespetuoso</option>
                        </datalist>
                    </p>
                    <button class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>