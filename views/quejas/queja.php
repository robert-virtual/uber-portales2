<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>queja</title>
</head>

<body class="my-custom-scroll-bar">
    <?php
    if ($this->reload) {
        header("Location: " . URL . "quejas/get/$this->id");
        die();
    }
    echo $this->error;
    require 'views/nav.php';
    ?>

    <main class="m-4 ">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-start gap-5">
                <button onclick="location.href='/quejas'" class="btn" style="width:50px;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </button>
                <form class="d-flex flex-column" action="/quejas/update" method="post">
                    <h1>Actualizar <?= $this->queja["id"]; ?></h1>
                    <input hidden value='<?= $this->queja["Id"]; ?>' name="id" type="text" />
                    <label for="usuarioid">ID de Usuario</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?= $this->queja["usuarioid"]; ?>" placeholder="ID de Usuario" name="usuarioid" type="text">
                    <label for="viajeid">ID de Viaje</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?= $this->queja["viajeid"]; ?>" placeholder="ID de Viaje" name="viajeid" type="text">
                    <label for="queja">Queja</label>
                    <input class="form-control my-2 " style="width:min-content !important;" value="<?= $this->queja["queja"]; ?>" placeholder="Queja" name="queja" type="text">
                    <div class="">
                        <button class="btn btn-primary ms-4">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>