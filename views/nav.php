
<head>
    
    <link rel="stylesheet" href="<?=URL?>public/css/nav.css">
</head>
<style>
#btn-hamburgesa {
  width: 3rem;
  color: white;
  background: none;
  border: none;
  font-size: 2rem;
}
body{
    overflow-x:hidden;
}
#nav-top {
  height: 10vh;
}
#right-nav a {
    padding:1rem;
}

#right-nav a:hover {
    padding:1rem;
    background-color: #2c3238;
    color:white;
}
#right-nav {
  z-index: 9999;
  position: fixed;
  display: flex;
  flex-direction: column;
  height: 90vh;
  width: 20rem;
  transform: translateX(20rem);
  padding: 1rem;
  right: 0;
  transform: translateX(100%);
  background-color: #212529;
  transition: all 0.5s;
}
#input-menu:checked + #right-nav {
    transition: all 0.5s;
  transform: translateX(0);
}


</style>

</head>
<nav id="nav-top" class=" p-4 bg-dark text-white d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
        <h3 class="d-inline">Uber</h3>
      
    </div>
    
    <div class="d-flex align-items-center gap-4">
        <span><?=$_SESSION["nombre"]?></span>
       
    </div>

    <label id="btn-hamburgesa" for="input-menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </label>

</nav>
<input type="checkbox" hidden id="input-menu" name="input-menu">
<nav  id="right-nav">
        <a class="text-white text text-decoration-none" href="/usuarios">Usuarios</a>
        <a class="text-white text text-decoration-none" href="/clientes">Clientes</a>
        <a class="text-white text text-decoration-none" href="/conductores">Conductores</a>
        <a class="text-white text text-decoration-none" href="/viajes">Viajes</a>
        <a class="text-white text text-decoration-none" href="/quejas">Quejas</a>
        <?php 
        if($_SESSION["ok"]){
        ?>
            <button onclick="location.href='/login/cerrar'"  class="btn btn-light my-2">Cerrar Sesión</button>
        <?php 

        }
        ?>
</nav>
