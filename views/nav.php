

<nav class="p-4 bg-dark text-white d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
        <h3 class="d-inline">Uber</h3>
        <a class="text-white text text-decoration-none mx-4" href="/">Inicio</a>
        <a class="text-white text text-decoration-none mx-4" href="/usuarios">Usuarios</a>
        <a class="text-white text text-decoration-none mx-4" href="/clientes">Clientes</a>
        <a class="text-white text text-decoration-none mx-4" href="/conductores">Conductores</a>
    </div>
    <div>
        <span><?=$_SESSION["nombre"]?></span>
        <a href="/login/cerrar" class="btn btn-light">Cerrar Session</a>
    </div>
</nav>