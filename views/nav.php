
<head>
<link rel="stylesheet" href="<?=URL?>public/css/nav.css">

</head>
<nav id="nav-top" class=" p-4 bg-dark text-white d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
        <h3 class="d-inline">Uber</h3>
      
    </div>
    
    <div class="d-flex align-items-center gap-4">
        <span><?=$_SESSION["nombre"]?></span>
       
    </div>

    <button class="btn-hamburgesa">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</nav>
<nav  id="right-nav">
<a class="text-white text text-decoration-none mx-4" href="/">Inicio</a>
        <a class="text-white text text-decoration-none mx-4" href="/usuarios">Usuarios</a>
        <a class="text-white text text-decoration-none mx-4" href="/clientes">Clientes</a>
        <a class="text-white text text-decoration-none mx-4" href="/conductores">Conductores</a>
        <a class="text-white text text-decoration-none mx-4" href="/viajes">Viajes</a>
        <a class="text-white text text-decoration-none mx-4" href="/quejas">Quejas</a>
        <?php 
        if($_SESSION["ok"]){
        ?>
            <a href="/login/cerrar" class="btn btn-light">Cerrar Session</a>
        <?php 

        }
        ?>
</nav>
