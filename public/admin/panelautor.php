<?php
session_start();
include("libreria.php");
comprobar("Autor");
?>
<?php include 'header.php'; ?>

<div class="row justify-content-md-center">
  <h1>Menú de Autor</h1>
</div>

  <div class="row justify-content-md-center">
    <div class="list-group col-md-8">
      <a class="list-group-item list-group-item-action active">
        OPCIONES
      </a>
      <a href="page-contenido.php" class="list-group-item list-group-item-action">Ingresar Contenido</a>
      <a href="page-consultar.php" class="list-group-item list-group-item-action">Consultar Contenido</a>
    </div>
  </div>

<?php include 'footer.php'; ?>
