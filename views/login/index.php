<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <main class="m-4 h-100 d-flex flex-column justify-content-center align-items-center">
        
        <span >
            <svg style="width:100px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M414.1 32H33.9C15.2 32 0 47.2 0 65.9V446c0 18.8 15.2 34 33.9 34H414c18.7 0 33.9-15.2 33.9-33.9V65.9C448 47.2 432.8 32 414.1 32zM237.6 391.1C163 398.6 96.4 344.2 88.9 269.6h94.4V290c0 3.7 3 6.8 6.8 6.8H258c3.7 0 6.8-3 6.8-6.8v-67.9c0-3.7-3-6.8-6.8-6.8h-67.9c-3.7 0-6.8 3-6.8 6.8v20.4H88.9c7-69.4 65.4-122.2 135.1-122.2 69.7 0 128.1 52.8 135.1 122.2 7.5 74.5-46.9 141.1-121.5 148.6z"/></svg>
        </span>
        <form class="d-flex flex-column" action="/login/entrar" method="post">
            <h1 class="text-center">Iniciar Session</h1>
            <div class="mb-3">
                <input name="correo" type="text" class="form-control" placeholder="Correo">
            </div>
            <div class="mb-3">
                <input name="clave" type="password" class="form-control" placeholder="Contraseña">
            </div>
            <button class="btn btn-primary">Entrar</button>
            <a class="text-center my-3" href="">Olvide mi cntraseña</a>
            <p class="text-center text-danger"><?=$this->error;?></p>
        </form>
    </main>

</body>
</html>