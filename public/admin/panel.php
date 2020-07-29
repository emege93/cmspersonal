<?php
session_start();
include("libreria.php");
comprobar("Administrador");
?>
<?php include 'header.php'; ?>

<div class="row justify-content-md-center">
  <h1>Menú de Administrador</h1>
</div>

<div class="row justify-content-md-center">
  <div class="list-group col-md-8">
    <a class="list-group-item list-group-item-action active">
      OPCIONES
    </a>
    <a href="page-contenido.php" class="list-group-item list-group-item-action">Ingresar Contenido</a>
    <a href="page-consultar.php" class="list-group-item list-group-item-action">Consultar Contenido</a>
    <a href="usuarios.php" class="list-group-item list-group-item-action">Usuarios</a>
    <a href="page-configuracion.php" class="list-group-item list-group-item-action">Configuración</a>
  </div>
</div>


<?php include 'footer.php'; ?>
